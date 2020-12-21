#!/usr/bin/python

import sqlite3

conn = sqlite3.connect('sqlite/test.db')

# conn.execute('''CREATE TABLE COMPANY
#         (ID INT PRIMARY KEY     NOT NULL,
#         NAME           TEXT    NOT NULL,
#         AGE            INT     NOT NULL,
#         ADDRESS        CHAR(50),
#         SALARY         REAL);''')


# conn.execute("INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY) \
#     VALUES (1, 'Paul', 32, 'California', 20000.00 )")

# conn.execute("INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY) \
#     VALUES (2, 'Allen', 25, 'Texas', 15000.00 )")

# conn.execute("INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY) \
#     VALUES (3, 'Teddy', 23, 'Norway', 20000.00 )")

# conn.execute("INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY) \
#     VALUES (4, 'Mark', 25, 'Rich-Mond ', 65000.00 )")

# conn.commit()

# select_str = "SELECT id, name, address, salary  from COMPANY"
# select_str = '''
# "SELECT * from COMPANY WHERE ID>1"
# '''
select_str = '''
SELECT * from COMPANY WHERE ID>1
'''


cursor = conn.execute(select_str)

for row in cursor:
    print(row)
    # print("ID = ", row[0])
    # print("NAME = ", row[1])
    # print("ADDRESS = ", row[2])
    # print("SALARY = ", row[3], "\n")

conn.close()
