import requests
from pprint import pprint
# Module placeholder for analysis #

def get_data_points(data):

    time = []
    open_p = []
    high_p = []
    low_p = []
    close_p = []
    volume = []
    avg_volume_w_p = []
    trade_count = []

    for field in data['results']:
        time.append(field['t'])
        open_p.append(field['o'])
        high_p.append(field['h'])
        low_p.append(field['l'])
        close_p.append(field['c'])
        volume.append(field['v'])
        avg_volume_w_p.append(field['vw'])
        trade_count.append(field['n'])

    # time = pd.to_datetime(time, unit='ms').date

    data_dict = {
        'Time': time,
        'Open Price': open_p,
        'Higher Price': high_p,
        'Lower Price': low_p,
        'Close Price': close_p,
        'Volume': volume,
        'Volume-Weighted AVG Price': avg_volume_w_p,
        'Number of Trades': trade_count
    }

    return data_dict

def fetch_data(api_url, API_KEY='ysdb0tYtWz0iKhuNeCAz4PL6ei1rFXPa'):
    try:
        response = requests.get(f'{api_url}?apiKey={API_KEY}')
        if response.status_code == 200:
            
            data = response.json()

            if data['resultsCount'] == 0:
                return None

            return get_data_points(data)
        else:
            raise ConnectionError(f'Status code {response.status_code}: Connection failed.')
        
    except requests.exceptions.RequestException as e:
        raise SystemExit(f"Request Failed... Error:\n{e}")