# Python资料

## Python基础

Python是一种高级动态类型的多范式编程语言。Python代码通常被称为可运行的伪代码，因为它允许你在非常少的代码行中表达非常强大的想法，同时具有非常可读性。作为示例，这里是Python中经典快速排序算法的实现：

```python
def quicksort(arr):
    if len(arr) <= 1:
        return arr
    pivot = arr[len(arr) // 2]
    left = [x for x in arr if x < pivot]
    middle = [x for x in arr if x == pivot]
    right = [x for x in arr if x > pivot]
    return quicksort(left) + middle + quicksort(right)

print(quicksort([3,6,8,10,1,2,1]))
# Prints "[1, 1, 2, 3, 6, 8, 10]"
```

### 基本数据类型

与大多数语言一样，Python有许多基本类型，包括整数，浮点数，布尔值和字符串。这些数据类型的行为方式与其他编程语言相似。

**Numbers(数字类型)**：代表的是整数和浮点数，它原理与其他语言相同：

```python
x = 3
print(type(x)) # Prints "<class 'int'>"
print(x)       # Prints "3"
print(x + 1)   # Addition; prints "4"
print(x - 1)   # Subtraction; prints "2"
print(x * 2)   # Multiplication; prints "6"
print(x ** 2)  # Exponentiation; prints "9"
x += 1
print(x)  # Prints "4"
x *= 2
print(x)  # Prints "8"
y = 2.5
print(type(y)) # Prints "<class 'float'>"
print(y, y + 1, y * 2, y ** 2) # Prints "2.5 3.5 5.0 6.25"
```

注意，与许多语言不同，Python没有一元增量(`x+`)或递减(`x-`)运算符。

**Booleans(布尔类型)**: Python实现了所有常用的布尔逻辑运算符，但它使用的是英文单词而不是符号 (`&&`, `||`, etc.)：

```python
t = True
f = False
print(type(t)) # Prints "<class 'bool'>"
print(t and f) # Logical AND; prints "False"
print(t or f)  # Logical OR; prints "True"
print(not t)   # Logical NOT; prints "False"
print(t != f)  # Logical XOR; prints "True"
```

**Strings(字符串类型)**：Python对字符串有很好的支持：

```python
hello = 'hello'    # String literals can use single quotes
world = "world"    # or double quotes; it does not matter.
print(hello)       # Prints "hello"
print(len(hello))  # String length; prints "5"
hw = hello + ' ' + world  # String concatenation
print(hw)  # prints "hello world"
hw12 = '%s %s %d' % (hello, world, 12)  # sprintf style string formatting
print(hw12)  # prints "hello world 12"
```

String对象有许多有用的方法；例如：

```python
s = "hello"
print(s.capitalize())  # Capitalize a string; prints "Hello"
print(s.upper())       # Convert a string to uppercase; prints "HELLO"
print(s.rjust(7))      # Right-justify a string, padding with spaces; prints "  hello"
print(s.center(7))     # Center a string, padding with spaces; prints " hello "
print(s.replace('l', '(ell)'))  # Replace all instances of one substring with another;
                                # prints "he(ell)(ell)o"
print('  world '.strip())  # Strip leading and trailing whitespace; prints "world"
```

### 容器(Containers)

Python包含几种内置的容器类型：列表、字典、集合和元组。

### 列表(Lists)

列表其实就是Python中的数组，但是可以它可以动态的调整大小并且可以包含不同类型的元素：

```python
xs = [3, 1, 2]    # Create a list
print(xs, xs[2])  # Prints "[3, 1, 2] 2"
print(xs[-1])     # Negative indices count from the end of the list; prints "2"
xs[2] = 'foo'     # Lists can contain elements of different types
print(xs)         # Prints "[3, 1, 'foo']"
xs.append('bar')  # Add a new element to the end of the list
print(xs)         # Prints "[3, 1, 'foo', 'bar']"
x = xs.pop()      # Remove and return the last element of the list
print(x, xs)      # Prints "bar [3, 1, 'foo']"
```

**切片(Slicing)**: 除了一次访问一个列表元素之外，Python还提供了访问子列表的简明语法; 这被称为切片：

```python
nums = list(range(5))     # range is a built-in function that creates a list of integers
print(nums)               # Prints "[0, 1, 2, 3, 4]"
print(nums[2:4])          # Get a slice from index 2 to 4 (exclusive); prints "[2, 3]"
print(nums[2:])           # Get a slice from index 2 to the end; prints "[2, 3, 4]"
print(nums[:2])           # Get a slice from the start to index 2 (exclusive); prints "[0, 1]"
print(nums[:])            # Get a slice of the whole list; prints "[0, 1, 2, 3, 4]"
print(nums[:-1])          # Slice indices can be negative; prints "[0, 1, 2, 3]"
nums[2:4] = [8, 9]        # Assign a new sublist to a slice
print(nums)               # Prints "[0, 1, 8, 9, 4]"
```

我们将在numpy数组的上下文中再次看到切片。

**(循环)Loops**: 你可以循环遍历列表的元素，如下所示：

```python
animals = ['cat', 'dog', 'monkey']
for animal in animals:
    print(animal)
# Prints "cat", "dog", "monkey", each on its own line.
```

如果要访问循环体内每个元素的索引，请使用内置的 `enumerate` 函数：

```python
animals = ['cat', 'dog', 'monkey']
for idx, animal in enumerate(animals):
    print('#%d: %s' % (idx + 1, animal))
# Prints "#1: cat", "#2: dog", "#3: monkey", each on its own line
```

**列表推导式(List comprehensions)**: 编程时，我们经常想要将一种数据转换为另一种数据。 举个简单的例子，思考以下计算平方数的代码：

```python
nums = [0, 1, 2, 3, 4]
squares = []
for x in nums:
    squares.append(x ** 2)
print(squares)   # Prints [0, 1, 4, 9, 16]
```

你可以使用 **列表推导式** 使这段代码更简单:

```python
nums = [0, 1, 2, 3, 4]
squares = [x ** 2 for x in nums]
print(squares)   # Prints [0, 1, 4, 9, 16]
```

列表推导还可以包含条件：

```text
nums = [0, 1, 2, 3, 4]
even_squares = [x ** 2 for x in nums if x % 2 == 0]
print(even_squares)  # Prints "[0, 4, 16]"
```

### 字典

字典存储（键，值）对，类似于Java中的`Map`或Javascript中的对象。你可以像这样使用它：

```python
d = {'cat': 'cute', 'dog': 'furry'}  # Create a new dictionary with some data
print(d['cat'])       # Get an entry from a dictionary; prints "cute"
print('cat' in d)     # Check if a dictionary has a given key; prints "True"
d['fish'] = 'wet'     # Set an entry in a dictionary
print(d['fish'])      # Prints "wet"
# print(d['monkey'])  # KeyError: 'monkey' not a key of d
print(d.get('monkey', 'N/A'))  # Get an element with a default; prints "N/A"
print(d.get('fish', 'N/A'))    # Get an element with a default; prints "wet"
del d['fish']         # Remove an element from a dictionary
print(d.get('fish', 'N/A')) # "fish" is no longer a key; prints "N/A"
```

**(循环)Loops**: 迭代词典中的键很容易：

```python
d = {'person': 2, 'cat': 4, 'spider': 8}
for animal in d:
    legs = d[animal]
    print('A %s has %d legs' % (animal, legs))
# Prints "A person has 2 legs", "A cat has 4 legs", "A spider has 8 legs"
```

如果要访问键及其对应的值，请使用`items`方法：

```python
d = {'person': 2, 'cat': 4, 'spider': 8}
for animal, legs in d.items():
    print('A %s has %d legs' % (animal, legs))
# Prints "A person has 2 legs", "A cat has 4 legs", "A spider has 8 legs"
```

**字典推导式(Dictionary comprehensions)**: 类似于列表推导式，可以让你轻松构建词典数据类型。例如：

```python
nums = [0, 1, 2, 3, 4]
even_num_to_square = {x: x ** 2 for x in nums if x % 2 == 0}
print(even_num_to_square)  # Prints "{0: 0, 2: 4, 4: 16}"
```

### 集合(Sets)

集合是不同元素的无序集合。举个简单的例子，请思考下面的代码：

```python
animals = {'cat', 'dog'}
print('cat' in animals)   # Check if an element is in a set; prints "True"
print('fish' in animals)  # prints "False"
animals.add('fish')       # Add an element to a set
print('fish' in animals)  # Prints "True"
print(len(animals))       # Number of elements in a set; prints "3"
animals.add('cat')        # Adding an element that is already in the set does nothing
print(len(animals))       # Prints "3"
animals.remove('cat')     # Remove an element from a set
print(len(animals))       # Prints "2"
```

**循环(Loops)**: 遍历集合的语法与遍历列表的语法相同；但是，由于集合是无序的，因此不能假设访问集合元素的顺序：

```python
animals = {'cat', 'dog', 'fish'}
for idx, animal in enumerate(animals):
    print('#%d: %s' % (idx + 1, animal))
# Prints "#1: fish", "#2: dog", "#3: cat"
```

**集合推导式(Set comprehensions)**: 就像列表和字典一样，我们可以很容易地使用集合理解来构造集合：

```python
from math import sqrt
nums = {int(sqrt(x)) for x in range(30)}
print(nums)  # Prints "{0, 1, 2, 3, 4, 5}"
```

### 元组(Tuples)

元组是（不可变的）有序值列表。 元组在很多方面类似于列表; 其中一个最重要的区别是元组可以用作字典中的键和集合的元素，而列表则不能。 这是一个简单的例子：

```python
d = {(x, x + 1): x for x in range(10)}  # Create a dictionary with tuple keys
t = (5, 6)        # Create a tuple
print(type(t))    # Prints "<class 'tuple'>"
print(d[t])       # Prints "5"
print(d[(1, 2)])  # Prints "1"
```

### 函数(Functions)

Python函数使用`def`关键字定义。例如：

```python
def sign(x):
    if x > 0:
        return 'positive'
    elif x < 0:
        return 'negative'
    else:
        return 'zero'

for x in [-1, 0, 1]:
    print(sign(x))
# Prints "negative", "zero", "positive"
```

我们经常定义函数来获取可选的关键字参数，如下所示：

```python
def hello(name, loud=False):
    if loud:
        print('HELLO, %s!' % name.upper())
    else:
        print('Hello, %s' % name)

hello('Bob') # Prints "Hello, Bob"
hello('Fred', loud=True)  # Prints "HELLO, FRED!"
```

### 类(Classes)

在Python中定义类的语法很简单：

```python
class Greeter(object):

    # Constructor
    def __init__(self, name):
        self.name = name  # Create an instance variable

    # Instance method
    def greet(self, loud=False):
        if loud:
            print('HELLO, %s!' % self.name.upper())
        else:
            print('Hello, %s' % self.name)

g = Greeter('Fred')  # Construct an instance of the Greeter class
g.greet()            # Call an instance method; prints "Hello, Fred"
g.greet(loud=True)   # Call an instance method; prints "HELLO, FRED!"
```

## python常用标准库

### sys

常用函数及变量

|  函数/变量  |               描述               |
| :---------: | :------------------------------: |
|    argv     |            命令行参数            |
| exit([arg]) |           退出当前程序           |
|   modules   |     将模块名映射到加载的模块     |
|    path     | 包含要在其中查找模块的目录的名称 |
|  platform   |            平台标识符            |
|    stdin    |              输入流              |
|   stdout    |              输出流              |
|   stderr    |              错误流              |

```python
import sys
args = sys.argv[1:]       # 获取命令行的输入参数,argv[0]是脚本名称，argv[1]是第一个传入参数
args.reverse()            # 列表反转
print(" ".join(args))     # 格式化美化输出 
  
PS C:\Users\wangtl> python c:/Users/wangtl/Desktop/b.py 1 2 3 4
4 3 2 1
```

### time

时间元组[tuple]：
(2008, 1, 21, 12, 2, 56, 0, 21, 0)表示2008年；1月；21日；12时；2分；56秒；星期一；2008年的第21天；不考虑夏令时。
时间秒数[secs]：
从新纪元开始过去的秒数。

```python
import time
print(time.time())

PS C:\Users\wangtl> & python c:/Users/wangtl/Desktop/b.py
1605077345.0264108
```

重要函数

|           函数            |                描述                 |
| :-----------------------: | :---------------------------------: |
|     asctime([tuple])      |       将时间元组转换为字符串        |
|     localtime([secs])     | 将秒数转换为表示当地时间的日期元组  |
|       mktime(tuple)       |      将时间元组转换为当地时间       |
|        sleep(secs)        |             休眠secs秒              |
| strptime(string[,format]) |       将字符串转换为时间元组        |
|          time()           | 当前时间（新纪元开始后的秒数，UTC） |

```python
import time
print(time.asctime())

PS C:\Users\wangtl> & python c:/Users/wangtl/Desktop/b.py
Wed Nov 11 14:43:30 2020
```

### random

|               函数               |                     描述                     |
| :------------------------------: | :------------------------------------------: |
|             random()             |             返回一个0~1的随机数              |
|          getrandbits(n)          |      以长整数方式返回n个随机的二进制位       |
|          uniform(a, b)           |         返回一个a~b（含）的随机实数          |
| randrange([start], stop, [step]) | 从range(start, stop, step)中随机地选择一个数 |
|           choice(seq)            |         从序列seq中随机选择一个元素          |
|      shuffle(seq,[,random])      |               就地打乱序列seq                |
|          sample(seq, n)          |      从序列seq中随机地选择n个不同的元素      |

### re

#### flags - 可选标志

正则表达式可以包含一些可选标志修饰符来控制匹配的模式。修饰符被指定为一个可选的标志。多个标志可以通过按位 OR(|) 它们来指定。如 re.I | re.M 被设置成 I 和 M 标志：

| 修饰符           | 描述                                                           |
| ---------------- | -------------------------------------------------------------- |
| re.I             | 使匹配对大小写不敏感                                           |
| re.L             | 做本地化识别（locale-aware）匹配                               |
| re.M             | 多行匹配，影响 ^ 和 $                                          |
| re.S             | 使 . 匹配包括换行在内的所有字符                                |
| re.U             | 根据Unicode字符集解析字符。这个标志影响\\w, \\W, \\b, \\B.     |
| re.X             | 该标志通过给予你更灵活的格式以便你将正则表达式写得更易于理解。 |
| Python正则表达式 | w3cschool菜鸟教程                                              |

#### pattern - 正则表达式模式

模式字符串使用特殊的语法来表示一个正则表达式：
字母和数字表示他们自身。一个正则表达式模式中的字母和数字匹配同样的字符串。
多数字母和数字前加一个反斜杠时会拥有不同的含义。
标点符号只有被转义时才匹配自身，否则它们表示特殊的含义。
反斜杠本身需要使用反斜杠转义。
由于正则表达式通常都包含反斜杠，所以你最好使用原始字符串来表示它们。模式元素(如 r'/t'，等价于'//t')匹配相应的特殊字符。
下表列出了正则表达式模式语法中的特殊元素。如果你使用模式的同时提供了可选的标志参数，某些模式元素的含义会改变。

| 模式          | 描述                                                                                                                                                                      |
| ------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| ^             | 匹配字符串的开头                                                                                                                                                          |
| $             | 匹配字符串的末尾。                                                                                                                                                        |
| .             | 匹配任意字符，除了换行符，当re.DOTALL标记被指定时，则可以匹配包括换行符的任意字符。                                                                                       |
| \[...\]       | 用来表示一组字符,单独列出：\[amk\] 匹配 'a'，'m'或'k'                                                                                                                     |
| \[^...\]      | 不在\[\]中的字符：\[^abc\] 匹配除了a,b,c之外的字符。                                                                                                                      |
| re\*          | 匹配0个或多个的表达式。                                                                                                                                                   |
| re+           | 匹配1个或多个的表达式。                                                                                                                                                   |
| re?           | 匹配0个或1个由前面的正则表达式定义的片段，贪婪方式                                                                                                                        |
| re{ n}        |                                                                                                                                                                           |
| re{ n,}       | 精确匹配n个前面表达式。                                                                                                                                                   |
| re{ n, m}     | 匹配 n 到 m 次由前面的正则表达式定义的片段，贪婪方式                                                                                                                      |
| a             | b                                                                                                                                                                         |
| (re)          | G匹配括号内的表达式，也表示一个组                                                                                                                                         |
| (?imx)        | 正则表达式包含三种可选标志：i, m, 或 x 。只影响括号中的区域。                                                                                                             |
| (?-imx)       | 正则表达式关闭 i, m, 或 x 可选标志。只影响括号中的区域。                                                                                                                  |
| (?: re)       | 类似 (...), 但是不表示一个组                                                                                                                                              |
| (?imx: re)    | 在括号中使用i, m, 或 x 可选标志                                                                                                                                           |
| (?-imx: re)   | 在括号中不使用i, m, 或 x 可选标志                                                                                                                                         |
| (?#...)       | 注释.                                                                                                                                                                     |
| (?= re)       | 前向肯定界定符。如果所含正则表达式，以 ... 表示，在当前位置成功匹配时成功，否则失败。但一旦所含表达式已经尝试，匹配引擎根本没有提高；模式的剩余部分还要尝试界定符的右边。 |
| (?! re)       | 前向否定界定符。与肯定界定符相反；当所含表达式不能在字符串当前位置匹配时成功                                                                                              |
| (?> re)       | 匹配的独立模式，省去回溯。                                                                                                                                                |
| \\w           | 匹配字母数字                                                                                                                                                              |
| \\W           | 匹配非字母数字                                                                                                                                                            |
| \\s           | 匹配任意空白字符，等价于\[\\t\\n\\r\\f\].                                                                                                                                 |
| \\S           | 匹配任意非空字符                                                                                                                                                          |
| \\d           | 匹配任意数字，等价于\[0-9\].                                                                                                                                              |
| \\D           | 匹配任意非数字                                                                                                                                                            |
| \\A           | 匹配字符串开始                                                                                                                                                            |
| \\Z           | 匹配字符串结束，如果是存在换行，只匹配到换行前的结束字符串。c                                                                                                             |
| \\z           | 匹配字符串结束                                                                                                                                                            |
| \\G           | 匹配最后匹配完成的位置。                                                                                                                                                  |
| \\b           | 匹配一个单词边界，也就是指单词和空格间的位置。例如， 'er\\b' 可以匹配"never" 中的 'er'，但不能匹配 "verb" 中的 'er'。                                                     |
| \\B           | 匹配非单词边界。'er\\B' 能匹配 "verb" 中的 'er'，但不能匹配 "never" 中的 'er'。                                                                                           |
| \\n, \\t, 等. | 匹配一个换行符。匹配一个制表符。等                                                                                                                                        |
| \\1...\\9     | 比赛第n个分组的子表达式。                                                                                                                                                 |
| \\10          | 匹配第n个分组的子表达式，如果它经匹配。否则指的是八进制字符码的表达式。                                                                                                   |

#### group(num) 或 groups()

| 匹配对象方法 | 描述                                                                                                       |
| ------------ | ---------------------------------------------------------------------------------------------------------- |
| group(num=0) | 匹配的整个表达式的字符串，group() 可以一次输入多个组号，在这种情况下它将返回一个包含那些组所对应值的元组。 |
| groups()     | 返回一个包含所有小组字符串的元组，从 1 到 所含的小组号。                                                   |

#### re.match函数

`re.match(pattern, string, flags=0)`尝试从字符串的开始匹配一个模式。
| 参数 | 描述 |
|: --- :| :--- :|
| pattern | 匹配的正则表达式 |
| string | 要匹配的字符串。 |
| flags | 标志位，用于控制正则表达式的匹配方式，如：是否区分大小写，多行匹配等等。 |

实例：

```python
#!/usr/bin/python
import re

line = "Cats are smarter than dogs"
matchObj = re.match( r'(.*) are (.*?) .*', line, re.M|re.I)

if matchObj:
   print "matchObj.group() : ", matchObj.group()
   print "matchObj.group(1) : ", matchObj.group(1)
   print "matchObj.group(2) : ", matchObj.group(2)
else:
   print "No match!!"
  
以上实例执行结果如下：
matchObj.group() :  Cats are smarter than dogs
matchObj.group(1) :  Cats
matchObj.group(2) :  smarter
```

#### re.search方法

`re.search(pattern, string, flags=0)`尝试从字符串的开始匹配一个模式。
实例：

```python
#!/usr/bin/python
import re

line = "Cats are smarter than dogs";
matchObj = re.match( r'(.*) are (.*?) .*', line, re.M|re.I)

if matchObj:
   print "matchObj.group() : ", matchObj.group()
   print "matchObj.group(1) : ", matchObj.group(1)
   print "matchObj.group(2) : ", matchObj.group(2)
else:
   print "No match!!"
  
以上实例执行结果如下： 
matchObj.group() :  Cats are smarter than dogs
matchObj.group(1) :  Cats
matchObj.group(2) :  smarter
```

#### 正则表达式实例

##### 字符匹配

| 实例   | 描述           |
| ------ | -------------- |
| python | 匹配 "python". |

##### 字符类

| 实例          | 描述                               |
| ------------- | ---------------------------------- |
| \[Pp\]ython   | 匹配 "Python" 或 "python"          |
| rub\[ye\]     | 匹配 "ruby" 或 "rube"              |
| \[aeiou\]     | 匹配中括号内的任意一个字母         |
| \[0-9\]       | 匹配任何数字。类似于\[0123456789\] |
| \[a-z\]       | 匹配任何小写字母                   |
| \[A-Z\]       | 匹配任何大写字母                   |
| \[a-zA-Z0-9\] | 匹配任何字母及数字                 |
| \[^aeiou\]    | 除了aeiou字母以外的所有字符        |
| \[^0-9\]      | 匹配除了数字外的字符               |

##### 特殊字符类

| 实例 | 描述                                                                                           |
| ---- | ---------------------------------------------------------------------------------------------- |
| .    | 匹配除 "\\n" 之外的任何单个字符。要匹配包括 '\\n' 在内的任何字符，请使用象 '\[.\\n\]' 的模式。 |
| \\d  | 匹配一个数字字符。等价于\[0-9\]。                                                              |
| \\D  | 匹配一个非数字字符。等价于\[^0-9\]。                                                           |
| \\s  | 匹配任何空白字符，包括空格、制表符、换页符等等。等价于\[ \\f\\n\\r\\t\\v\]。                   |
| \\S  | 匹配任何非空白字符。等价于\[^ \\f\\n\\r\\t\\v\]。                                              |
| \\w  | 匹配包括下划线的任何单词字符。等价于'\[A-Za-z0-9\_\]'。                                        |
| \\W  | 匹配任何非单词字符。等价于 '\[^A-Za-z0-9\_\]'。                                                |

### urllib

```python
from urllib.request import urlopen
# url = "http://x32r593676.qicp.vip/con2pi.php?pi=get_temp"     # get请求
url = "http://x32r593676.qicp.vip/weibo_top_csv.php"
data = urlopen(url).read().decode()
print(data)
```

## tkinter模块常用参数

### `tkinter.Tk()` 生成主窗口

```python
import tkinter
root=tkinter.Tk()
root.title('标题名')    　　 　　修改框体的名字,也可在创建时使用className参数来命名；
root.resizable(0,0)   　　 　　框体大小可调性，分别表示x,y方向的可变性；
root.geometry('250x150')　　指定主框体大小；
root.quit()#退出；
root.update_idletasks()
root.update()        　　　　　刷新页面；
```

### 初级样例

```python
import tkinter
root=tkinter.Tk() #生成root主窗口
label=tkinter.Label(root,text='Hello,GUI') #生成标签
label.pack()        #将标签添加到主窗口
button1=tkinter.Button(root,text='Button1') #生成button1
button1.pack(side=tkinter.LEFT)         #将button1添加到root主窗口
button2=tkinter.Button(root,text='Button2')
button2.pack(side=tkinter.RIGHT)
root.mainloop()             #进入消息循环（必需组件）
```

### 15种核心组件

|    组件     |                                含义                                |
| :---------: | :----------------------------------------------------------------: |
|   Button    |                                按钮                                |
|   Canvas    |                   绘图形组件，可以在其中绘制图形                   |
| Checkbutton |                               复选框                               |
|    Entry    |                           文本框（单行）                           |
|    Text     |                          文本框（多行）；                          |
|    Frame    |                      框架，将几个组件组成一组                      |
|    Label    |                     标签，可以显示文字或图片；                     |
|   Listbox   |                              列表框；                              |
|    Menu     |                               菜单；                               |
| Menubutton  |                   它的功能完全可以使用Menu替代；                   |
|   Message   |         与Label组件类似，但是可以根据自身大小将文本换行；          |
| Radiobutton |                              单选框；                              |
|    Scale    |                  滑块；允许通过滑块来设置一数字值                  |
|  Scrollbar  | 滚动条；配合使用canvas,entry,listbox,andtext窗口部件的标准滚动条； |
|  Toplevel   |                      用来创建子窗口窗口组件。                      |

### 放置和排版pack,grid,place

**pack组件设置位置属性参数：**

|                        属性                        |                                           内容                                           |
| :------------------------------------------------: | :--------------------------------------------------------------------------------------: |
|                       after                        |                                 将组件置于其他组件之后；                                 |
|                       before                       |                                 将组件置于其他组件之前；                                 |
|                       anchor                       |                     组件的对齐方式，顶对齐'n',底对齐's',左'w',右'e'                      |
|                        side                        | 组件在主窗口的位置，可以为'top','bottom','left','right'（使用时tkinter.TOP,tkinter.E）； |
|                        fill                        |                                填充方式(Y,垂直，X，水平）                                |
|                       expand                       |                                    1可扩展，0不可扩展                                    |
| **grid组件使用行列的方法放置组件的位置，参数有：** |                                                                                          |
|                        属性                        |                                           内容                                           |
|                      :------:                      |                                         :-----:                                          |
|                       column                       |                                  组件所在的列起始位置；                                  |
|                     columnspam                     |                                       组件的列宽；                                       |
|                        row                         |                                  组件所在的行起始位置；                                  |
|                      rowspam                       |                                       组件的行宽；                                       |
| **place组件可以直接使用坐标来放置组件，参数有：**  |                                                                                          |
|                        属性                        |                                           内容                                           |
|                      :------:                      |                                         :-----:                                          |
|                       ancho                        |                                      组件对齐方式；                                      |
|                         x                          |                                   组件左上角的x坐标；                                    |
|                         y                          |                                   组件右上角的y坐标；                                    |
|                        relx                        |                        组件相对于窗口的x坐标，应为0-1之间的小数；                        |
|                        rely                        |                        组件相对于窗口的y坐标，应为0-1之间的小数；                        |
|                       width                        |                                       组件的宽度；                                       |
|                       heitht                       |                                       组件的高度；                                       |
|                      relwidth                      |                               组件相对于窗口的宽度，0-1；                                |
|                     relheight                      |                               组件相对于窗口的高度，0-1；                                |

### 按钮tkinter.Button

|       属性       |                 内容                 |
| :--------------: | :----------------------------------: |
|      anchor      |        指定按钮上文本的位置；        |
|  background(bg)  |          指定按钮的背景色；          |
|      bitmap      |        指定按钮上显示的位图；        |
| borderwidth(bd)  |         指定按钮边框的宽度；         |
|     command      |       指定按钮消息的回调函数；       |
|      cursor      |   指定鼠标移动到按钮上的指针样式；   |
|       font       |        指定按钮上文本的字体；        |
|  foreground(fg)  |          指定按钮的前景色；          |
|      height      |           指定按钮的高度；           |
|      image       |        指定按钮上显示的图片；        |
|      state       |     指定按钮的状态（disabled）；     |
|       text       |        指定按钮上显示的文本；        |
|      width       |            指定按钮的宽度            |
|       padx       | 设置文本与按钮边框x的距离，还有pady; |
| activeforeground |             按下时前景色             |
|   textvariable   |   可变文本，与StringVar等配合着用    |

### 文本框tkinter.Entry，tkinter.Text

|       属性       |                     内容                      |
| :--------------: | :-------------------------------------------: |
|  background(bg)  |                文本框背景色；                 |
|  foreground(fg)  |                                               |
| selectbackground |                                               |
| selectforeground |                                               |
| borderwidth(bd)  |               文本框边框宽度；                |
|       font       |                    字体；                     |
|       show       | 文本框显示的字符，若为*，表示文本框为密码框； |
|      state       |                    状态；                     |
|      width       |                  文本框宽度                   |
|   textvariable   |        可变文本，与StringVar等配合着用        |

### 标签tkinter.Label

|     属性     |                  内容                   |
| :----------: | :-------------------------------------: |
|    Anchor    |               文本的位置                |
|    bitmap    |              标签中的位图               |
|     font     |                  字体                   |
|    image     |              标签中的图片               |
|   justify    |           多行文本的对齐方式            |
|     text     |   标签中的文本，可以使用'\n'表示换行    |
| textvariable | 显示文本自动更新，与StringVar等配合着用 |

### 单选框和复选框Radiobutton,Checkbutton

|      属性      |                      内容                      |
| :------------: | :--------------------------------------------: |
|     anchor     |                   文本位置；                   |
| background(bg) |                    背景色；                    |
| foreground(fg) |                    前景色；                    |
|  borderwidth   |                   边框宽度；                   |
|     width      |                  组件的宽度；                  |
|     height     |                   组件高度；                   |
|     bitmap     |                 组件中的位图；                 |
|     image      |                 组件中的图片；                 |
|      font      |                     字体；                     |
|    justify     |           组件中多行文本的对齐方式；           |
|      text      |                指定组件的文本；                |
|     value      |         指定组件被选中中关联变量的值；         |
|    variable    |             指定组件所关联的变量；             |
|  indicatoron   | 特殊控制参数，当为0时，组件会被绘制成按钮形式; |
|  textvariable  |      可变文本显示，与StringVar等配合着用       |

### 组图组件Canvas

|                                                        属性                                                        |                                 内容                                  |
| :----------------------------------------------------------------------------------------------------------------: | :-------------------------------------------------------------------: |
|                                                   background(bg)                                                   |                                背景色                                 |
|                                                   foreground(fg)                                                   |                                前景色                                 |
|                                                    borderwidth                                                     |                             组件边框宽度                              |
|                                                       width                                                        |                               组件宽度                                |
|                                                       height                                                       |                                 高度                                  |
|                                                       bitmap                                                       |                                 位图                                  |
|                                                       image                                                        |                                 图片                                  |
|                                              绘图的方法主要以下几种：                                              |                                                                       |
| 只要用create_方法画了一个图形，就会自动返回一个ID,创建一个图形时将它赋值给一个变量，需要ID时就可以使用这个变量名。 |                                                                       |
|                                                        属性                                                        |                                 内容                                  |
|                                                      :------:                                                      |                                :-----:                                |
|                                                     create_arc                                                     |                                 圆弧                                  |
|                                                   create_bitmap                                                    |                          绘制位图，支持XBM;                           |
|                                                    create_image                                                    |                 绘制图片，支持GIF(x,y,image,anchor);                  |
|                                                    create_line                                                     |                              绘制支线；                               |
|                                                    create_oval                                                     |                              绘制椭圆；                               |
|                                                   create_polygon                                                   |    绘制多边形(坐标依次罗列，不用加括号，还有参数，fill,outline)；     |
|                                                  create_rectangle                                                  |            绘制矩形((a,b,c,d),值为左上角和右下角的坐标)；             |
|                                                    create_text                                                     |                       绘制文字(字体参数font,)；                       |
|                                                   create_window                                                    |                              绘制窗口；                               |
|                                                       delete                                                       |                           删除绘制的图形；                            |
|                                                     itemconfig                                                     |       修改图形属性，第一个参数为图形的ID，后边为想修改的参数；        |
|                                                        move                                                        | move(1,4,0)1为图像对象,4为横移4像素,0为纵移像素;用root.update()刷新； |
|                                                     coords(ID)                                                     |                返回对象的位置的两个坐标（4个数字元组）                |

### 菜单Menu

参数：

|      属性       |                                   内容                                    |
| :-------------: | :-----------------------------------------------------------------------: |
|     tearoff     |                   分窗，0为在原窗，1为点击分为两个窗口                    |
|      bg,fg      |                                背景，前景                                 |
|   borderwidth   |                                 边框宽度                                  |
|      font       |                                   字体                                    |
| activebackgound | 点击时背景，同样有activeforeground，activeborderwidth，disabledforeground |
|     cursor      |                                                                           |
|   postcommand   |                                                                           |
|   selectcolor   |                                选中时背景                                 |
|    takefocus    |                                                                           |
|      title      |                                                                           |
|      type       |                                                                           |
|     relief      |                                                                           |

方法：

|         属性         |              内容               |
| :------------------: | :-----------------------------: |
|   menu.add_cascade   |           添加子选项            |
|   menu.add_command   | 添加命令（label参数为显示内容） |
|  menu.add_separator  |           添加分隔线            |
| menu.add_checkbutton |          添加确认按钮           |
|        delete        |              删除               |

### 事件关联

```python
bind(sequence,func,add)——
bind_class(className,sequence,func,add)
bind_all(sequence,func,add)
```

事件参数：

|   属性    |          内容           |
| :-------: | :---------------------: |
| sequence  |      所绑定的事件       |
|   func    |  所绑定的事件处理函数   |
|    add    | 可选参数，为空字符或‘+’ |
| className |       所绑定的类        |

鼠标键盘事件：

|                    属性                    |                  内容                  |
| :----------------------------------------: | :------------------------------------: |
|                  Button-1                  |  鼠标左键按下，2表示中键，3表示右键；  |
|               ButtonPress-1                |                  同上                  |
|              ButtonRelease-1               |              鼠标左键释放              |
|                 B1-Motion                  |            按住鼠标左键移动            |
|              Double-Button-1               |                双击左键                |
|                   Enter                    |        鼠标指针进入某一组件区域        |
|                   Leave                    |        鼠标指针离开某一组件区域        |
|                 MouseWheel                 |                滚动滚轮                |
|                 KeyPress-A                 |        按下A键，A可用其他键替代        |
|               Alt-KeyPress-A               | 同时按下alt和A；alt可用ctrl和shift替代 |
|             Double-KeyPress-A              |              快速按两下A               |
|              Lock-KeyPress-A               |             大写状态下按A              |
|                 窗口事件:                  |                                        |
|                    属性                    |                  内容                  |
|                  :------:                  |                :-----:                 |
|                  activate                  |     当组件由可用转变为不可用时触发     |
|                  Destroy                   |           当组件被销毁时触发           |
|                   Expose                   |   当组件从被遮挡状态中暴露出来时触发   |
|                   Unmap                    |   当组件由显示状态变为隐藏状态时触发   |
|                  FocusOut                  |          当组件失去焦点时触发          |
|                  Property                  |     当窗体的属性被删除或改变时触发     |
|                 Visibility                 |        当组件变为可视状态时触发        |
| 响应事件:event对象（def function(event)）: |                                        |
|                    属性                    |                  内容                  |
|                  :------:                  |                :-----:                 |
|                    char                    |       按键字符，仅对键盘事件有效       |
|                  keycode                   |        按键名，仅对键盘事件有效        |
|                   keysym                   |       按键编码，仅对键盘事件有效       |
|                    num                     |       鼠标按键，仅对鼠标事件有效       |
|                    type                    |            所触发的事件类型            |
|                   widget                   |             引起事件的组件             |
|                width,heigh                 |   组件改变后的大小，仅Configure有效    |
|                    x,y                     |        鼠标当前位置，相对于窗口        |
|               x_root,y_root                |      鼠标当前位置，相对于整个屏幕      |

### 弹窗

`messagebox._show`函数的控制参数：

|           属性           | 内容                   |
| :----------------------: | :--------------------- |
|         default          | 指定消息框按钮         |
|           icon           | 指定消息框图标         |
|         message          | 指定消息框所显示的消息 |
|          parent          | 指定消息框的父组件     |
|          title           | 标题                   |
|           type           | 类型                   |
|  simpledialog模块参数：  |                        |
|           属性           | 内容                   |
|         :------:         | :-----:                |
|          title           | 指定对话框的标题       |
|          prompt          | 显示的文字             |
|       initialvalue       | 指定输入框的初始值     |
|        filedialog        | 模块参数               |
|         filetype         | 指定文件类型           |
|        initialdir        | 指定默认目录           |
|       initialfile        | 指定默认文件           |
|          title           | 指定对话框标题         |
| `colorchooser`模块参数： |                        |
|           属性           | 内容                   |
|         :------:         | :-----:                |
|       initialcolor       | 指定初始化颜色         |
|          title           | 指定对话框标题         |

### 字体（font)

一般格式：
`('Times',10,'bold','italic')`  依次表示字体、字号、加粗、倾斜
补充：
`config`重新配置

```python
label.config(font='Arial -%d bold' % scale.get()) # 依次为字体，大小（大小可为字号大小），加粗
tkinter.StringVar    # 能自动刷新的字符串变量，可用set和get方法进行传值和取值，类似的还有IntVar,DoubleVar  
sys.stdout.flush()　　# 刷新输出  
```

## minidom函数使用

```python
运行结果：python
# Dom写XML文件
from xml.dom import minidom

# 1、创建DOM树对象
dom = minidom.Document()

# 2、创建根节点，每次都用DOM对象创建*任何*节点
root_node = dom.createElement('root')
# 3、用DOM对象添加根节点
dom.appendChild(root_node)

# 用DOM对象添加根节点
book_node = dom.createElement('book')
# 在父节点下创建子节点
root_node.appendChild(book_node)
# 设置节点属性
book_node.setAttribute('price','199')


# 创建第二个根节点
name_node = dom.createElement('name')
root_node.appendChild(name_node)

# 用DOM创建文本节点,文字内容为子节点
name_text = dom.createTextNode('计算机程序设计语言 第一版')
name_node.appendChild(name_text)


# 写入xml文件
with open('dom_write.xml', 'w', encoding='UTF-8') as f:
    # writexml()参数（目标文件对象，根节点缩进格式，子节点缩进格式，换行格式，xml内容编码）
    dom.writexml(f, indent='', addindent='\t', newl='\n', encoding='UTF-8')
    print('写入OK')
```

```xml
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <book price="199"/>
    <name>计算机程序设计语言 第一版</name>
</root>
```

### DOM解析XML文件

```python
# Dom解析XML文件
from xml.dom import minidom

# 写入xml文件
with open('dom_write.xml', 'r', encoding='utf8') as f:
    # parser()获取DOM对象
    dom = minidom.parse(f)
    # 获取根节点
    root = dom.documentElement
    # 节点名称
    print(root.nodeName)
    # 节点类型：‘ELEMENT_NODE’，元素节点；‘TEXT_NODE’，文本节点；‘ATTRIBUTE_NODE’，属性节点 
    print(root.nodeType)
    # 获取子节点(列表)
    print(root.childNodes)

    # 通过dom对象或根元素，根据标签名获取元素节点
    book = root.getElementsByTagName('book')[0]
    print(book.getAttribute('price'))

    # 获取某个元素节点的文本内容，先获取子文本节点，然后通过data属性获取文本内容
    name = root.getElementsByTagName('name')[0]
    name_text_node = name.childNodes[0]
    print(name_text_node.data)

    # 获取某个节点的父节点
    print(name.parentNode.nodeName)
```

运行结果：

```bash
PS D:\My File\Python> & C:/Users/wangtl/AppData/Local/Programs/Python/Python37/python.exe "d:/My File/Python/More/test.py"
root
1
[<DOM Text node "'\n\t'">, <DOM Element: book at 0x24c02037b90>, <DOM Text node "'\n\t'">, <DOM Element: name at 0x24c02037c28>, <DOM Text node "'\n'">]
199
计算机程序设计语言 第一版
root
```
