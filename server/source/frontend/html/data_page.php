<?php 

require_once '../../backend/php/commander.php';
$data =  [];
$ticker = isset($_GET["ticker-input"]) ? $_GET["ticker-input"]:null;
$span = isset($_GET["time-span"]) ? $_GET["time-span"] : null ;
$startDate = isset($_GET["start-date"]) ? $_GET["start-date"]:null;
$endDate = isset( $_GET["end-date"]) ? $_GET["end-date"]:null;

if (isset($ticker) && isset($span) && isset($startDate) && isset($endDate)) {
    $api_url = "https://api.polygon.io/v2/aggs/ticker/$ticker/range/1/$span/$startDate/$endDate"; 
    
    $data = getStaticData($api_url);
    $data = (json_decode($data, true));  
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>

    <link rel="stylesheet" href="/frontend/components/main_page.css">
    <link rel="stylesheet" href="/frontend/components/general.css">
    <link rel="stylesheet" href="/frontend/components/data_display.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body>
    
    <div class="top_options_panel">
        <button class="menu" name="main_home_btn" onclick="window.location.href='/index.php';">Home</button>
        <button class="menu" name="main_data_btn" onclick="window.location.href='/frontend/html/data_page.php';">Data</button>
        <button class="menu" name="main_markets_btn" onclick="window.location.href='/frontend/html/markets_page.html';">Markets</button>
        <button class="menu" name="main_countries_btn" onclick="window.location.href='/frontend/html/countries_page.html';">Countries</button>
        <button class="menu" name="main_news_btn" onclick="window.location.href='/frontend/html/news_page.html';">News</button>
    </div>

    <form class="form-container" action="" method="get" style="top:250px; position:fixed;">
        <div class="autocomplete-container">
            <label for="code-input">Ticker:</label><br><br>
            <input type="text" id="code-input" name="ticker-input" placeholder="Company Ticker" required>
        </div>
    
        <div class="time-span">
            <label for="time-span-select">Time Span:</label><br><br>
            <select id="time-span-select" name="time-span" required>
                <option value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
            </select>
        </div>
    
        <div class="start-date">
            <label for="start-date-input">Start Date:</label><br><br>
            <i id="start-date-icon" class="calendar" required></i>
            <input type="date" id="start-date-input" name="start-date" min="2022-01-01" max="2023-12-31">
        </div>
    
        <div class="input-container end-date">
            <label for="end-date-input">End Date:</label><br><br>
            <i id="end-date-icon" class="fa fa-calendar" required></i>
            <input type="date" id="end-date-input" name="end-date" min="2022-01-01" max="2023-12-31">
        </div>
    
        <div class="filter-container">
            <button type="submit" class="filter-button">Filter</button>
        </div>
        
    </form>

  <canvas id="myChart" style="width:100%;max-width:1100px;position:absolute; top:90vh;"></canvas>
  
  <div class="sqr" style="height: 200vh; width: 0px; background-color: #000;"></div>

<script >

const dataGraphString='<?php echo json_encode($data) ?>'
const dataGraph = JSON.parse(dataGraphString);
console.log('This is my Data:')
console.log(dataGraph)

var c_price = dataGraph['Close Price']; // -> arr
var h_price = dataGraph['Higher Price']; // -> arr
var l_price = dataGraph['Lower Price']; // -> arr
var m_time = dataGraph['Time']; // -> arr time (milliseconds)

var time = [];

function ms_to_year(ms) {
  const date = new Date(ms);
  const month = date.getUTCMonth() + 1;
  const year = date.getUTCFullYear();

  const formattedMonth = month < 10 ? `0${month}` : month;

  return `${formattedMonth}-${year}`;
}

if (c_price && h_price && l_price && m_time) {

  for (j = 0; j < m_time.length; j ++) {
  time.push(ms_to_year(m_time[j]));
  }
  console.log(time)
  console.log(c_price)


  // arr => str (time)
  // arr => int (close, high, low price)
  // [{ time[i]: price[i] }, { time[i]: price[i] }, { time[i]: price[i] }]
  let close = [];
  let high = [];
  let low = [];
  
  for (i = 0; i < time.length; i ++) {
    close.push({ x:time[i], y:c_price[i] });
    high.push({ x:time[i], y:h_price[i] });
    low.push({ x: time[i], y:l_price[i] });
  }

console.log(close)
console.log(high)
console.log(low)

}

const myChart = new Chart("myChart", {
  type: "line",
  data: {
    datasets: [
      {
        label: 'Close Price',
        data: [],
        borderColor: '#ff0000',
        fill: false,
      },
      {
        label: 'High Price',
        data: [],
        borderColor: '#00ff00',
        fill: false,
      },
      {
        label: 'Low Price',
        data: [],
        borderColor: '#0000ff',
        fill: false,
      }
    ]
  },
  options: {
    scales: {
      x: {
        type: 'time',
        position: 'bottom',
        title: {
          display: true,
          text: 'Time (seconds)',
          color: '#fff'
        },
        time: {
          parser: 'MM-YYYY',
          unit: 'month',
          displayFormats: {
            month: 'MM-YYYY'
          }
        },
        grid: {
          color: '#ddd',
          drawBorder: true,
          drawOnChartArea: true
        },
        ticks: {
          color: '#fff'
        }
      },
      y: {
        title: {
          display: true,
          text: 'Stock Value',
          color: '#fff'
        },
        grid: {
          color: '#ddd',
          drawBorder: true,
          drawOnChartArea: true
        },
        ticks: {
          color: '#fff'
        }
      }
    },
    plugins: {
      legend: {
        labels: {
          color: '#fff'
        }
      }
    }
  }
});


function updateChartData(event) {
  event.preventDefault();
  const newData = {
    line1: close,
    line2: high,
    line3: low
  };

  // Data not being read correctly even after MM-YYYY configuration

  myChart.data.datasets[0].data = newData.line1;
  myChart.data.datasets[1].data = newData.line2;
  myChart.data.datasets[2].data = newData.line3;

  myChart.update();
}
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="/backend/JavaScript/autocomplete_ticker.js"></script>

</body>
</html>


