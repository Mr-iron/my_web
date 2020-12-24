# Numpy、Scipy、Matplotlib教程

## Numpy

[numpy](http://www.numpy.org/)是Python中科学计算的核心库。它提供了一个高性能的多维数组对象，以及用于处理这些数组的工具。如果你已经熟悉MATLAB，你可能会发现这篇教程对于你从MATLAB切换到学习Numpy很有帮助。

### 数组(Arrays)

numpy数组是一个值网格，所有类型都相同，并由非负整数元组索引。 维数是数组的排名; 数组的形状是一个整数元组，给出了每个维度的数组大小。

我们可以从嵌套的Python列表初始化numpy数组，并使用方括号访问元素：

```python
import numpy as np

a = np.array([1, 2, 3])   # Create a rank 1 array
print(type(a))            # Prints "<class 'numpy.ndarray'>"
print(a.shape)            # Prints "(3,)"
print(a[0], a[1], a[2])   # Prints "1 2 3"
a[0] = 5                  # Change an element of the array
print(a)                  # Prints "[5, 2, 3]"

b = np.array([[1,2,3],[4,5,6]])    # Create a rank 2 array
print(b.shape)                     # Prints "(2, 3)"
print(b[0, 0], b[0, 1], b[1, 0])   # Prints "1 2 4"
```

Numpy还提供了许多创建数组的函数：

```python
import numpy as np

a = np.zeros((2,2))   # Create an array of all zeros
print(a)              # Prints "[[ 0.  0.]
                      #          [ 0.  0.]]"

b = np.ones((1,2))    # Create an array of all ones
print(b)              # Prints "[[ 1.  1.]]"

c = np.full((2,2), 7)  # Create a constant array
print(c)               # Prints "[[ 7.  7.]
                       #          [ 7.  7.]]"

d = np.eye(2)         # Create a 2x2 identity matrix
print(d)              # Prints "[[ 1.  0.]
                      #          [ 0.  1.]]"

e = np.random.random((2,2))  # Create an array filled with random values
print(e)                     # Might print "[[ 0.91940167  0.08143941]
                             #               [ 0.68744134  0.87236687]]"
```

### 创建 Numpy 数组的不同方式

Numpy库的核心是数组对象或ndarray对象（n维数组）。你将使用Numpy数组执行逻辑，统计和傅里叶变换等运算。作为使用Numpy的一部分，你要做的第一件事就是创建Numpy数组。本指南的主要目的是帮助数据科学爱好者了解可用于创建Numpy数组的不同方式。

创建Numpy数组有三种不同的方法：

1. 使用Numpy内部功能函数
2. 从列表等其他Python的结构进行转换
3. 使用特殊的库函数

#### 使用Numpy内部功能函数

Numpy具有用于创建数组的内置函数。 我们将在本指南中介绍其中一些内容。

##### 创建一个一维的数组

首先，让我们创建一维数组或rank为1的数组。`arange`是一种广泛使用的函数，用于快速创建数组。将值20传递给`arange`函数会创建一个值范围为0到19的数组。

```python
import Numpy as np
array = np.arange(20)
array
```

输出：

```python
array([0,  1,  2,  3,  4,
       5,  6,  7,  8,  9,
       10, 11, 12, 13, 14,
       15, 16, 17, 18, 19])
```

要验证此数组的维度，请使用shape属性。

```python
array.shape
```

输出：

```python
(20,)
```

由于逗号后面没有值，因此这是一维数组。 要访问此数组中的值，请指定非负索引。 与其他编程语言一样，索引从零开始。 因此，要访问数组中的第四个元素，请使用索引3。

```python
array[3]
```

输出：

```python
3
```

Numpy的数组是可变的，这意味着你可以在初始化数组后更改数组中元素的值。 使用print函数查看数组的内容。

```python
array[3] = 100
print(array)
```

输出：

```python
[  0   1   2 100
   4   5   6   7
   8   9  10  11
   12  13  14  15
   16  17  18  19]
```

与Python列表不同，Numpy数组的内容是同质的。 因此，如果你尝试将字符串值分配给数组中的元素，其数据类型为int，则会出现错误。

```python
array[3] ='Numpy'
```

输出：

```python
ValueError: invalid literal for int() with base 10: 'Numpy'
```

##### 创建一个二维数组

我们来谈谈创建一个二维数组。 如果只使用arange函数，它将输出一维数组。 要使其成为二维数组，请使用reshape函数链接其输出。

```python
array = np.arange(20).reshape(4,5)
array
```

输出：

```python
array([[ 0,  1,  2,  3,  4],
       [ 5,  6,  7,  8,  9],
       [10, 11, 12, 13, 14],
       [15, 16, 17, 18, 19]])
```

首先，将创建20个整数，然后将数组转换为具有4行和5列的二维数组。 我们来检查一下这个数组的维数。

```python
(4, 5)
```

由于我们得到两个值，这是一个二维数组。 要访问二维数组中的元素，需要为行和列指定索引。

```python
array[3][4]
```

输出：

```python
19
```

##### 创建三维数组及更多维度

要创建三维数组，请为重塑形状函数指定3个参数。

```python
array = np.arange(27).reshape(3,3,3)
array
```

输出：

```python
array([[[ 0,  1,  2],
        [ 3,  4,  5],
        [ 6,  7,  8]],

       [[ 9, 10, 11],
        [12, 13, 14],
        [15, 16, 17]],

       [[18, 19, 20],
        [21, 22, 23],
        [24, 25, 26]]])
```

需要注意的是：数组中元素的数量（27）必须是其尺寸（3\*3\*3）的乘积。 要交叉检查它是否是三维数组，可以使用shape属性。

```python
array.shape
```

输出：

```python
(3, 3, 3)
```

此外，使用`arange`函数，你可以创建一个在定义的起始值和结束值之间具有特定序列的数组。

```python
np.arange(10, 35, 3)
```

输出：

```python
array([10, 13, 16, 19, 22, 25, 28, 31, 34])
```

#### 使用其他Numpy函数

除了arange函数之外，你还可以使用其他有用的函数（如 `zeros` 和 `ones`）来快速创建和填充数组。

使用`zeros`函数创建一个填充零的数组。函数的参数表示行数和列数（或其维数）。

```python
np.zeros((2,4))
```

输出：

```python
array([[0., 0., 0., 0.],
       [0., 0., 0., 0.]])
```

使用`ones`函数创建一个填充了1的数组。

```python
np.ones((3,4))
```

输出：

```python
array([[1., 1., 1., 1.],
       [1., 1., 1., 1.],
       [1., 1., 1., 1.]])
```

`empty`函数创建一个数组。它的初始内容是随机的，取决于内存的状态。

```python
np.empty((2,3))
```

输出：

```python
array([[0.65670626, 0.52097334, 0.99831087],
       [0.07280136, 0.4416958 , 0.06185705]])
```

`full`函数创建一个填充给定值的n * n数组。

```python
np.full((2,2), 3)
```

输出：

```python
array([[3, 3],
       [3, 3]])
```

`eye`函数可以创建一个n * n矩阵，对角线为1s，其他为0。

```python
np.eye(3,3)
```

输出：

```python
array([[1., 0., 0.],
       [0., 1., 0.],
       [0., 0., 1.]])
```

函数`linspace`在指定的时间间隔内返回均匀间隔的数字。 例如，下面的函数返回0到10之间的四个等间距数字。

```python
np.linspace(0, 10, num=4)
```

输出：

```python
array([ 0., 3.33333333, 6.66666667, 10.])
```

#### 从Python列表转换

除了使用Numpy函数之外，你还可以直接从Python列表创建数组。将Python列表传递给数组函数以创建Numpy数组：

```python
array = np.array([4,5,6])
array
```

输出：

```python
array([4, 5, 6])
```

你还可以创建Python列表并传递其变量名以创建Numpy数组。

```python
list = [4,5,6]
list
```

输出：

```python
[4, 5, 6]
```

```python
array = np.array(list)
array
```

输出：

```python
array([4, 5, 6])
```

你可以确认变量`array`和`list`分别是Python列表和Numpy数组。

```python
type(list)
```

> list

```python
type(array)
```

> Numpy.ndarray

要创建二维数组，请将一系列列表传递给数组函数。

```python
array = np.array([(1,2,3), (4,5,6)])
array
```

输出：

```python
array([[1, 2, 3],
       [4, 5, 6]])
```

```python
array.shape
```

输出：

```text
(2, 3)
```

#### 使用特殊的库函数

你还可以使用特殊库函数来创建数组。例如，要创建一个填充0到1之间随机值的数组，请使用`random`函数。这对于需要随机状态才能开始的问题特别有用。

```python
np.random.random((2,2))
```

输出：

```python
array([[0.1632794 , 0.34567049],
       [0.03463241, 0.70687903]])
```

### 数组索引

Numpy提供了几种索引数组的方法。

#### 花式索引

`花式索引` 是获取数组中我们想要的特定元素的有效方法。

```python
# Fancy indexing
a = np.arange(0, 100, 10)
indices = [1, 5, -1]
b = a[indices]
print(a) # >>>[ 0 10 20 30 40 50 60 70 80 90]
print(b) # >>>[10 50 90]
```

#### 切片(Slicing)

与Python列表类似，可以对numpy数组进行切片。由于数组可能是多维的，因此必须为数组的每个维指定一个切片：

```python
import numpy as np

# Create the following rank 2 array with shape (3, 4)
# [[ 1  2  3  4]
#  [ 5  6  7  8]
#  [ 9 10 11 12]]
a = np.array([[1,2,3,4], [5,6,7,8], [9,10,11,12]])

# Use slicing to pull out the subarray consisting of the first 2 rows
# and columns 1 and 2; b is the following array of shape (2, 2):
# [[2 3]
#  [6 7]]
b = a[:2, 1:3]

# A slice of an array is a view into the same data, so modifying it
# will modify the original array.
print(a[0, 1])   # Prints "2"
b[0, 0] = 77     # b[0, 0] is the same piece of data as a[0, 1]
print(a[0, 1])   # Prints "77"
```

你还可以将整数索引与切片索引混合使用。 但是，这样做会产生比原始数组更低级别的数组。 请注意，这与MATLAB处理数组切片的方式完全不同：

```python
import numpy as np

# Create the following rank 2 array with shape (3, 4)
# [[ 1  2  3  4]
#  [ 5  6  7  8]
#  [ 9 10 11 12]]
a = np.array([[1,2,3,4], [5,6,7,8], [9,10,11,12]])

# Two ways of accessing the data in the middle row of the array.
# Mixing integer indexing with slices yields an array of lower rank,
# while using only slices yields an array of the same rank as the
# original array:
row_r1 = a[1, :]    # Rank 1 view of the second row of a
row_r2 = a[1:2, :]  # Rank 2 view of the second row of a
print(row_r1, row_r1.shape)  # Prints "[5 6 7 8] (4,)"
print(row_r2, row_r2.shape)  # Prints "[[5 6 7 8]] (1, 4)"

# We can make the same distinction when accessing columns of an array:
col_r1 = a[:, 1]
col_r2 = a[:, 1:2]
print(col_r1, col_r1.shape)  # Prints "[ 2  6 10] (3,)"
print(col_r2, col_r2.shape)  # Prints "[[ 2]
                             #          [ 6]
                             #          [10]] (3, 1)"
```

#### 整数数组索引

使用切片索引到numpy数组时，生成的数组视图将始终是原始数组的子数组。 相反，整数数组索引允许你使用另一个数组中的数据构造任意数组。 这是一个例子：

```python
import numpy as np

a = np.array([[1,2], [3, 4], [5, 6]])

# An example of integer array indexing.
# The returned array will have shape (3,) and
print(a[[0, 1, 2], [0, 1, 0]])  # Prints "[1 4 5]"

# The above example of integer array indexing is equivalent to this:
print(np.array([a[0, 0], a[1, 1], a[2, 0]]))  # Prints "[1 4 5]"

# When using integer array indexing, you can reuse the same
# element from the source array:
print(a[[0, 0], [1, 1]])  # Prints "[2 2]"

# Equivalent to the previous integer array indexing example
print(np.array([a[0, 1], a[0, 1]]))  # Prints "[2 2]"
```

整数数组索引的一个有用技巧是从矩阵的每一行中选择或改变一个元素：

```python
import numpy as np

# Create a new array from which we will select elements
a = np.array([[1,2,3], [4,5,6], [7,8,9], [10, 11, 12]])

print(a)  # prints "array([[ 1,  2,  3],
          #                [ 4,  5,  6],
          #                [ 7,  8,  9],
          #                [10, 11, 12]])"

# Create an array of indices
b = np.array([0, 2, 0, 1])

# Select one element from each row of a using the indices in b
print(a[np.arange(4), b])  # Prints "[ 1  6  7 11]"

# Mutate one element from each row of a using the indices in b
a[np.arange(4), b] += 10

print(a)  # prints "array([[11,  2,  3],
          #                [ 4,  5, 16],
          #                [17,  8,  9],
          #                [10, 21, 12]])
```

**布尔数组索引**: 布尔数组索引允许你选择数组的任意元素。通常，这种类型的索引用于选择满足某些条件的数组元素。下面是一个例子：

```python
import numpy as np

a = np.array([[1,2], [3, 4], [5, 6]])

bool_idx = (a > 2)   # Find the elements of a that are bigger than 2;
                     # this returns a numpy array of Booleans of the same
                     # shape as a, where each slot of bool_idx tells
                     # whether that element of a is > 2.

print(bool_idx)      # Prints "[[False False]
                     #          [ True  True]
                     #          [ True  True]]"

# We use boolean array indexing to construct a rank 1 array
# consisting of the elements of a corresponding to the True values
# of bool_idx
print(a[bool_idx])  # Prints "[3 4 5 6]"

# We can do all of the above in a single concise statement:
print(a[a > 2])     # Prints "[3 4 5 6]"
```

为简洁起见，我们省略了很多关于numpy数组索引的细节; 如果你想了解更多，你应该阅读[这篇文档](https://www.numpy.org.cn/reference/array_objects/indexing.html)。

#### 布尔屏蔽

布尔屏蔽是一个有用的功能，它允许我们根据我们指定的条件检索数组中的元素。

```python
# Boolean masking
import matplotlib.pyplot as plt

a = np.linspace(0, 2 * np.pi, 50)
b = np.sin(a)
plt.plot(a,b)
mask = b >= 0
plt.plot(a[mask], b[mask], 'bo')
mask = (b >= 0) & (a <= np.pi / 2)
plt.plot(a[mask], b[mask], 'go')
plt.show()
```

上面的示例显示了如何进行布尔屏蔽。你所要做的就是将数组传递给涉及数组的条件，它将为你提供一个值的数组，为该条件返回true。

该示例生成以下图：

![布尔掩码结果图](https://www.numpy.org.cn/static/images/article/numpy_masking-1.png)

我们利用这些条件来选择图上的不同点。蓝色点(在图中还包括绿点，但绿点掩盖了蓝色点)，显示值大于0的所有点。绿色点表示值大于0且小于一半π的所有点。

#### 缺省索引

不完全索引是从多维数组的第一个维度获取索引或切片的一种方便方法。例如，如果数组a=[1，2，3，4，5]，[6，7，8，9，10]，那么[3]将在数组的第一个维度中给出索引为3的元素，这里是值4。

```python
# Incomplete Indexing
a = np.arange(0, 100, 10)
b = a[:5]
c = a[a >= 50]
print(b) # >>>[ 0 10 20 30 40]
print(c) # >>>[50 60 70 80 90]
```

#### Where 函数

where() 函数是另外一个根据条件返回数组中的值的有效方法。只需要把条件传递给它，它就会返回一个使得条件为真的元素的列表。

```python
# Where
a = np.arange(0, 100, 10)
b = np.where(a < 50) 
c = np.where(a >= 50)[0]
print(b) # >>>(array([0, 1, 2, 3, 4]),)
print(c) # >>>[5 6 7 8 9]
```

### 数据类型

每个numpy数组都是相同类型元素的网格。Numpy提供了一组可用于构造数组的大量数值数据类型。Numpy在创建数组时尝试猜测数据类型，但构造数组的函数通常还包含一个可选参数来显式指定数据类型。这是一个例子：

```python
import numpy as np

x = np.array([1, 2])   # Let numpy choose the datatype
print(x.dtype)         # Prints "int64"

x = np.array([1.0, 2.0])   # Let numpy choose the datatype
print(x.dtype)             # Prints "float64"

x = np.array([1, 2], dtype=np.int64)   # Force a particular datatype
print(x.dtype)                         # Prints "int64"
```

你可以在[这篇文档](https://www.numpy.org.cn/user_guide/numpy_basics/data_types.html)中阅读有关numpy数据类型的所有信息。

### 数组中的数学

基本数学函数在数组上以元素方式运行，既可以作为运算符重载，也可以作为numpy模块中的函数：

```python
import numpy as np

x = np.array([[1,2],[3,4]], dtype=np.float64)
y = np.array([[5,6],[7,8]], dtype=np.float64)

# Elementwise sum; both produce the array
# [[ 6.0  8.0]
#  [10.0 12.0]]
print(x + y)
print(np.add(x, y))

# Elementwise difference; both produce the array
# [[-4.0 -4.0]
#  [-4.0 -4.0]]
print(x - y)
print(np.subtract(x, y))

# Elementwise product; both produce the array
# [[ 5.0 12.0]
#  [21.0 32.0]]
print(x * y)
print(np.multiply(x, y))

# Elementwise division; both produce the array
# [[ 0.2         0.33333333]
#  [ 0.42857143  0.5       ]]
print(x / y)
print(np.divide(x, y))

# Elementwise square root; produces the array
# [[ 1.          1.41421356]
#  [ 1.73205081  2.        ]]
print(np.sqrt(x))
```

请注意，与MATLAB不同，`*`是元素乘法，而不是矩阵乘法。 我们使用`dot`函数来计算向量的内积，将向量乘以矩阵，并乘以矩阵。 `dot`既可以作为numpy模块中的函数，也可以作为数组对象的实例方法：

```python
import numpy as np

x = np.array([[1,2],[3,4]])
y = np.array([[5,6],[7,8]])

v = np.array([9,10])
w = np.array([11, 12])

# Inner product of vectors; both produce 219
print(v.dot(w))
print(np.dot(v, w))

# Matrix / vector product; both produce the rank 1 array [29 67]
print(x.dot(v))
print(np.dot(x, v))

# Matrix / matrix product; both produce the rank 2 array
# [[19 22]
#  [43 50]]
print(x.dot(y))
print(np.dot(x, y))
```

Numpy为在数组上执行计算提供了许多有用的函数；其中最有用的函数之一是 `SUM`：

```python
import numpy as np

x = np.array([[1,2],[3,4]])

print(np.sum(x))  # Compute sum of all elements; prints "10"
print(np.sum(x, axis=0))  # Compute sum of each column; prints "[4 6]"
print(np.sum(x, axis=1))  # Compute sum of each row; prints "[3 7]"
```

你可以在[这篇文档](https://www.numpy.org.cn/reference/routines/math.html)中找到numpy提供的数学函数的完整列表。

除了使用数组计算数学函数外，我们经常需要对数组中的数据进行整形或其他操作。这种操作的最简单的例子是转置一个矩阵；要转置一个矩阵，只需使用一个数组对象的`T`属性：

```python
import numpy as np

x = np.array([[1,2], [3,4]])
print(x)    # Prints "[[1 2]
            #          [3 4]]"
print(x.T)  # Prints "[[1 3]
            #          [2 4]]"

# Note that taking the transpose of a rank 1 array does nothing:
v = np.array([1,2,3])
print(v)    # Prints "[1 2 3]"
print(v.T)  # Prints "[1 2 3]"
```

Numpy提供了许多用于操作数组的函数；你可以在[这篇文档](https://www.numpy.org.cn/reference/routines/array_manipulation_routines.html)中看到完整的列表。

### 广播(Broadcasting)

广播是一种强大的机制，它允许numpy在执行算术运算时使用不同形状的数组。通常，我们有一个较小的数组和一个较大的数组，我们希望多次使用较小的数组来对较大的数组执行一些操作。

例如，假设我们要向矩阵的每一行添加一个常数向量。我们可以这样做：

```python
import numpy as np

# We will add the vector v to each row of the matrix x,
# storing the result in the matrix y
x = np.array([[1,2,3], [4,5,6], [7,8,9], [10, 11, 12]])
v = np.array([1, 0, 1])
y = np.empty_like(x)   # Create an empty matrix with the same shape as x

# Add the vector v to each row of the matrix x with an explicit loop
for i in range(4):
    y[i, :] = x[i, :] + v

# Now y is the following
# [[ 2  2  4]
#  [ 5  5  7]
#  [ 8  8 10]
#  [11 11 13]]
print(y)
```

这会凑效; 但是当矩阵 `x` 非常大时，在Python中计算显式循环可能会很慢。注意，向矩阵 `x` 的每一行添加向量 `v` 等同于通过垂直堆叠多个 `v` 副本来形成矩阵 `vv`，然后执行元素的求和`x` 和 `vv`。 我们可以像如下这样实现这种方法：

```python
import numpy as np

# We will add the vector v to each row of the matrix x,
# storing the result in the matrix y
x = np.array([[1,2,3], [4,5,6], [7,8,9], [10, 11, 12]])
v = np.array([1, 0, 1])
vv = np.tile(v, (4, 1))   # Stack 4 copies of v on top of each other
print(vv)                 # Prints "[[1 0 1]
                          #          [1 0 1]
                          #          [1 0 1]
                          #          [1 0 1]]"
y = x + vv  # Add x and vv elementwise
print(y)  # Prints "[[ 2  2  4
          #          [ 5  5  7]
          #          [ 8  8 10]
          #          [11 11 13]]"
```

Numpy广播允许我们在不实际创建`v`的多个副本的情况下执行此计算。考虑这个需求，使用广播如下：

```python
import numpy as np

# We will add the vector v to each row of the matrix x,
# storing the result in the matrix y
x = np.array([[1,2,3], [4,5,6], [7,8,9], [10, 11, 12]])
v = np.array([1, 0, 1])
y = x + v  # Add v to each row of x using broadcasting
print(y)  # Prints "[[ 2  2  4]
          #          [ 5  5  7]
          #          [ 8  8 10]
          #          [11 11 13]]"
```

`y=x+v`行即使`x`具有形状`(4，3)`和`v`具有形状`(3,)`，但由于广播的关系，该行的工作方式就好像`v`实际上具有形状`(4，3)`，其中每一行都是`v`的副本，并且求和是按元素执行的。

将两个数组一起广播遵循以下规则：

1. 如果数组不具有相同的rank，则将较低等级数组的形状添加1，直到两个形状具有相同的长度。
2. 如果两个数组在维度上具有相同的大小，或者如果其中一个数组在该维度中的大小为1，则称这两个数组在维度上是兼容的。
3. 如果数组在所有维度上兼容，则可以一起广播。
4. 广播之后，每个数组的行为就好像它的形状等于两个输入数组的形状的元素最大值。
5. 在一个数组的大小为1且另一个数组的大小大于1的任何维度中，第一个数组的行为就像沿着该维度复制一样

以下是广播的一些应用：

```python
import numpy as np

# Compute outer product of vectors
v = np.array([1,2,3])  # v has shape (3,)
w = np.array([4,5])    # w has shape (2,)
# To compute an outer product, we first reshape v to be a column
# vector of shape (3, 1); we can then broadcast it against w to yield
# an output of shape (3, 2), which is the outer product of v and w:
# [[ 4  5]
#  [ 8 10]
#  [12 15]]
print(np.reshape(v, (3, 1)) * w)

# Add a vector to each row of a matrix
x = np.array([[1,2,3], [4,5,6]])
# x has shape (2, 3) and v has shape (3,) so they broadcast to (2, 3),
# giving the following matrix:
# [[2 4 6]
#  [5 7 9]]
print(x + v)

# Add a vector to each column of a matrix
# x has shape (2, 3) and w has shape (2,).
# If we transpose x then it has shape (3, 2) and can be broadcast
# against w to yield a result of shape (3, 2); transposing this result
# yields the final result of shape (2, 3) which is the matrix x with
# the vector w added to each column. Gives the following matrix:
# [[ 5  6  7]
#  [ 9 10 11]]
print((x.T + w).T)
# Another solution is to reshape w to be a column vector of shape (2, 1);
# we can then broadcast it directly against x to produce the same
# output.
print(x + np.reshape(w, (2, 1)))

# Multiply a matrix by a constant:
# x has shape (2, 3). Numpy treats scalars as arrays of shape ();
# these can be broadcast together to shape (2, 3), producing the
# following array:
# [[ 2  4  6]
#  [ 8 10 12]]
print(x * 2)
```

广播通常会使你的代码更简洁，效率更高，因此你应该尽可能地使用它。

## SciPy

Numpy提供了一个高性能的多维数组和基本工具来计算和操作这些数组。 而[SciPy](https://docs.scipy.org/doc/scipy/reference/)以此为基础，提供了大量在numpy数组上运行的函数，可用于不同类型的科学和工程应用程序。

熟悉SciPy的最佳方法是浏览[它的文档](https://docs.scipy.org/doc/scipy/reference/index.html)。我们将重点介绍SciPy有关的对你有价值的部分内容。

### 图像操作

SciPy提供了一些处理图像的基本函数。例如，它具有将映像从磁盘读入numpy数组、将numpy数组作为映像写入磁盘以及调整映像大小的功能。下面是一个演示这些函数的简单示例：

```python
from scipy.misc import imread, imsave, imresize

# Read an JPEG image into a numpy array
img = imread('assets/cat.jpg')
print(img.dtype, img.shape)  # Prints "uint8 (400, 248, 3)"

# We can tint the image by scaling each of the color channels
# by a different scalar constant. The image has shape (400, 248, 3);
# we multiply it by the array [1, 0.95, 0.9] of shape (3,);
# numpy broadcasting means that this leaves the red channel unchanged,
# and multiplies the green and blue channels by 0.95 and 0.9
# respectively.
img_tinted = img * [1, 0.95, 0.9]

# Resize the tinted image to be 300 by 300 pixels.
img_tinted = imresize(img_tinted, (300, 300))

# Write the tinted image back to disk
imsave('assets/cat_tinted.jpg', img_tinted)
```

![猫咪](https://www.numpy.org.cn/static/images/article/cat.jpg) ![猫咪](https://www.numpy.org.cn/static/images/article/cat_tinted.jpg)

左：原始图像。右：着色和调整大小的图像。

### MATLAB 文件

函数 `scipy.io.loadmat` 和 `scipy.io.savemat` 允许你读取和写入MATLAB文件。你可以在[这篇文档](https://docs.scipy.org/doc/scipy/reference/io.html)中学习相关操作。

### 点之间的距离

SciPy定义了一些用于计算点集之间距离的有用函数。

函数`scipy.spatial.distance.pdist`计算给定集合中所有点对之间的距离：

```python
import numpy as np
from scipy.spatial.distance import pdist, squareform

# Create the following array where each row is a point in 2D space:
# [[0 1]
#  [1 0]
#  [2 0]]
x = np.array([[0, 1], [1, 0], [2, 0]])
print(x)

# Compute the Euclidean distance between all rows of x.
# d[i, j] is the Euclidean distance between x[i, :] and x[j, :],
# and d is the following array:
# [[ 0.          1.41421356  2.23606798]
#  [ 1.41421356  0.          1.        ]
#  [ 2.23606798  1.          0.        ]]
d = squareform(pdist(x, 'euclidean'))
print(d)
```

你可以在[这篇文档](http://docs.scipy.org/doc/scipy/reference/generated/scipy.spatial.distance.pdist.html)中阅读有关此功能的所有详细信息。

类似的函数（`scipy.spatial.distance.cdist`）计算两组点之间所有对之间的距离; 你可以在[这篇文档](https://docs.scipy.org/doc/scipy/reference/generated/scipy.spatial.distance.cdist.html)中阅读它。

## Matplotlib

[Matplotlib](https://matplotlib.org/)是一个绘图库。本节简要介绍 `matplotlib.pyplot` 模块，该模块提供了类似于MATLAB的绘图系统。

### 绘制

matplotlib中最重要的功能是`plot`，它允许你绘制2D数据的图像。这是一个简单的例子：

```python
import numpy as np
import matplotlib.pyplot as plt

# Compute the x and y coordinates for points on a sine curve
x = np.arange(0, 3 * np.pi, 0.1)
y = np.sin(x)

# Plot the points using matplotlib
plt.plot(x, y)
plt.show()  # You must call plt.show() to make graphics appear.
```

运行此代码会生成以下图表：

![sine](https://www.numpy.org.cn/static/images/article/sine.png)

通过一些额外的工作，我们可以轻松地一次绘制多条线，并添加标题，图例和轴标签：

```python
import numpy as np
import matplotlib.pyplot as plt

# Compute the x and y coordinates for points on sine and cosine curves
x = np.arange(0, 3 * np.pi, 0.1)
y_sin = np.sin(x)
y_cos = np.cos(x)

# Plot the points using matplotlib
plt.plot(x, y_sin)
plt.plot(x, y_cos)
plt.xlabel('x axis label')
plt.ylabel('y axis label')
plt.title('Sine and Cosine')
plt.legend(['Sine', 'Cosine'])
plt.show()
```

![sine_cosine](https://www.numpy.org.cn/static/images/article/sine_cosine.png)

你可以在[这篇文档](https://matplotlib.org/api/pyplot_api.html#matplotlib.pyplot.plot)中阅读有关`绘图`功能的更多信息。

### 子图

你可以使用`subplot`函数在同一个图中绘制不同的东西。 这是一个例子：

```python
import numpy as np
import matplotlib.pyplot as plt

# Compute the x and y coordinates for points on sine and cosine curves
x = np.arange(0, 3 * np.pi, 0.1)
y_sin = np.sin(x)
y_cos = np.cos(x)

# Set up a subplot grid that has height 2 and width 1,
# and set the first such subplot as active.
plt.subplot(2, 1, 1)

# Make the first plot
plt.plot(x, y_sin)
plt.title('Sine')

# Set the second subplot as active, and make the second plot.
plt.subplot(2, 1, 2)
plt.plot(x, y_cos)
plt.title('Cosine')

# Show the figure.
plt.show()
```

![sine_cosine_subplot](https://www.numpy.org.cn/static/images/article/sine_cosine_subplot.png)

你可以在[这篇文档](https://matplotlib.org/api/pyplot_api.html#matplotlib.pyplot.subplot)中阅读有关**子图**功能的更多信息。

### 图片

你可以使用 `imshow` 函数来显示一张图片。 这是一个例子：

```python
import numpy as np
from scipy.misc import imread, imresize
import matplotlib.pyplot as plt

img = imread('assets/cat.jpg')
img_tinted = img * [1, 0.95, 0.9]

# Show the original image
plt.subplot(1, 2, 1)
plt.imshow(img)

# Show the tinted image
plt.subplot(1, 2, 2)

# A slight gotcha with imshow is that it might give strange results
# if presented with data that is not uint8. To work around this, we
# explicitly cast the image to uint8 before displaying it.
plt.imshow(np.uint8(img_tinted))
plt.show()
```

![cat_tinted_imshow](https://www.numpy.org.cn/static/images/article/cat_tinted_imshow.png)
