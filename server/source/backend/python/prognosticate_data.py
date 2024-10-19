import yfinance as yf # Instead of an API, we will instead use this library to give us sufficient data to use accurately.
import sys
import json
from pprint import pprint
import pandas as pd
import numpy as np
import datetime
from sklearn.model_selection import train_test_split

def get_data(ticker:str)->pd.DataFrame:

    data = yf.download(ticker)
    # dummy_url = f'https://api.polygon.io/v2/aggs/ticker/{ticker}/range/1/day/2018-01-09/2024-01-01' # Get as much data as possible

    return data

# Export Default Function for our PHP Shell
def prognosticate_data(data:pd.DataFrame, predict:str = 'Close'):

    if not (isinstance(data,pd.DataFrame)):
        raise ValueError('Data must be a Pandas Data Frame for analysis')

    # ML algorithm here ! Refer to JupyterHub Notes from DSCI 102

    data['EMA-50'] = data['Close'].ewm(span=50, adjust=False).mean()
    data['EMA-200'] = data['Close'].ewm(span=200, adjust=False).mean()
    data = data.dropna()

    try:
        x = data[['Open', 'High', 'Low', 'EMA-50', 'EMA-200']]
        y = data[predict]
    except KeyError as e:
        print(f'Key Not included within data. Error:\n {e}')

    x_train, x_test, y_train, y_test = train_test_split(x, y, test_size=0.2, random_state=42)

    print(data)

if __name__ == '__main__':
    
    # ticker = sys.argv[1]
    ticker = 'AAPL'

    try:
        
        staticData = get_data(ticker)

        new_data = prognosticate_data(staticData)

        # print(json.dumps(new_data, default=str))

    except Exception as e:
        print(f"Error occurred: {e}")



# def parse_to_date(mstime:list[int]):
#     converted_dates = [datetime.utcfromtimestamp(ts / 1000).strftime('%d-%m-%Y') for ts in mstime]
#     return converted_dates

# l = [1665633600000, 1703826000000]
# print(parse_to_date(l))