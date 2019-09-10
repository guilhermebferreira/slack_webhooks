import json
import requests


def send_to_slack(message):
    slack_data = {
        'text': message
    }

    webhook_url = 'SLACK WEBHOOK'

    response = requests.post(
        webhook_url, data=json.dumps(slack_data),
        headers={'Content-Type': 'application/json'}
    )

    if response.status_code != 200:
        raise ValueError(
            'Request to slack returned an error %s, the response is:\n%s'
            % (response.status_code, response.text)
        )
