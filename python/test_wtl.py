#!/usr/bin/python3
from html.parser import HTMLParser
from urllib.request import urlopen

# web = "http://python.org/jobs"
web = "http://x32r593676.qicp.vip/data/main_study.html"
web_text = urlopen(web).read().decode()

class Scraper(HTMLParser):
    in_link = False
    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        if tag == 'p':
            self.in_link = True
            self.chunks = []

    def handle_data(self, data):
        if self.in_link:
            self.chunks.append(data)

    def handle_endtag(self, tag):
        if tag == 'p':
            print('{}'.format(''.join(self.chunks)))
            self.in_link = False

parser = Scraper()
parser.feed(web_text)
parser.close
