from backend.python.static_data import fetch_data
import sys
import json

# _____________________________________ GLOBAL MARKET DATA REQUEST _____________________________________ #

if __name__ == "__main__":
    
    api_url = sys.argv[1]

    try:

        data = fetch_data(api_url)
        print(json.dumps(data, default=str))

    except Exception as e:
        print(f"Error occurred: {e}")

