# from gmd_request import data
# import pandas as pd
# import numpy as np

# ! Inactive module !
# Refer to gmd_request.py 

# def get_data_points(data):

#     time = []
#     open_p = []
#     high_p = []
#     low_p = []
#     close_p = []
#     volume = []
#     avg_volume_w_p = []
#     trade_count = []

#     for field in data['results']:
#         time.append(field['t'])
#         open_p.append(field['o'])
#         high_p.append(field['h'])
#         low_p.append(field['l'])
#         close_p.append(field['c'])
#         volume.append(field['v'])
#         avg_volume_w_p.append(field['vw'])
#         trade_count.append(field['n'])
    
#     time = pd.to_datetime(time, unit='ms').date

#     open_p = np.array(open_p)
#     high_p = np.array(high_p)
#     low_p = np.array(low_p)
#     close_p = np.array(close_p)
#     volume = np.array(volume)
#     avg_volume_w_p = np.array(avg_volume_w_p)
#     trade_count = np.array(trade_count)

#     data_dict = {
#         'Time': time,
#         'Open Price': open_p,
#         'Higher Price': high_p,
#         'Lower Price': low_p,
#         'Close Price': close_p,
#         'Volume': volume,
#         'Volume-Weighted AVG Price': avg_volume_w_p,
#         'Number of Trades': trade_count 
#     }

#     return data_dict

# global_finance_df = pd.DataFrame(get_data_points(data))