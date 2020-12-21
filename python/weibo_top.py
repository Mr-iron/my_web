#!/usr/bin/python3
from urllib.request import urlopen
from html.parser import HTMLParser
import re
import csv
import codecs
main_url = 'https://s.weibo.com'

html_src = urlopen("https://s.weibo.com/top/summary?cate=realtimehot")
src = html_src.read().decode()

class Scraper(HTMLParser):
    in_link = 0
    obj_tag = ""
    chunks = []
    url = ""
    out_dict = {}
    def handle_starttag(self, tag, attrs):
        attrs = dict(attrs)
        self.url = attrs.get('href','')
        matchObj = re.search("=top", self.url, re.M|re.I)

        if tag == self.obj_tag and matchObj:
            self.in_link = 1


    def handle_endtag(self, tag):
        if tag == self.obj_tag and self.in_link:
            self.in_link = 0

    def handle_data(self, data):
        if self.in_link:
            self.out_dict[data]= main_url + self.url


parser = Scraper()
parser.obj_tag = "a"
parser.feed(src)
parser.close()
tr_list = []

# print(parser.chunks())
number = 0
csv_data = {}
with codecs.open('tmp/weibo_top.csv','w',encoding='utf-8-sig')as f:
    fieldnames = {'标题','链接'}
    writer = csv.DictWriter(f,fieldnames=fieldnames)
    writer.writeheader()
    for i in parser.out_dict.items():
        a = str(i[0])       #inner
        b = str(i[1])       #link
        # print(w_value)
        number = number+1
        if number>10:
            break

        csv_data['标题'] = a 
        csv_data['链接'] = b
        print(csv_data)
        writer.writerow(csv_data)

