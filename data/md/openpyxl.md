# openpyxl学习资料

`import openpyxl`

---

## workbook/worksheet操作

### 新建文件

`wb = openpyxl.Workbook()`创建workbook

`wb.active.title = "wtl_main"`可修改默认worksheet名称

### 打开文件

`workbook = openpyxl.load_workbook("xltest.xlsx", read_only=True)`

只读模式：**read_only**

### 保存文件

`wb.save("a.xlsx")`保存workbook

### 创建工作表

`ws1 = wb.create_sheet("wtl_2")`# 默认插在工作簿末尾

`ws2 = wb.create_sheet(title="wtl_0", index=0)`# 插入在工作簿的第一个位置

### 选择工作表

- 根据名称读取：`sheet = wb['测试页']`

- 通过索引 index 读取：`sheet = wb.worksheets[1]`

- 获取当前正在使用的 sheet 页：`sheet =  wb.active`

- 工作表名：`sheet.title`

- 最大列数：`sheet.max_column`

- 最大行数：`sheet.max_row`

### 删除工作表

```python
ws_wtl = wb["wtl_0"]    # 获取工作表
wb.remove(ws_wtl)       # 删除工作表
```

### 查询所有工作表

返回所有工作表(list):`sheet = wb.worksheets`

获取 sheet 页的名称列表:`ws_list = wb.sheetnames`

---

## 单元格操作

### 插入数据（行）

`ws_main.append(["Fruit", "Quantity", "Price", "col"])`

### 访问单元格

`a = sheet1['B2']`单元格访问方式1

`a = sheet1.cell(row=2, column=2)`单元格访问方式2([1, 1]是首行首列单元格)

`a = sheet1.cell(2, 2, 56)`访问单元格并写入值56为写入数值

`print("值:%s,行:%d,列:%d,符号:%s；" % (a.value, a.row, a.column, a.coordinate))`获取单元格参数

`sheet.max_row`工作表最大行

`sheet.max_column`工作表最大列

### 访问区间单元格

遍历所有数据rows或者columns

```python
for row in sheet1.rows:          
    for cell in row:        
        print(cell)

for col in sheet1.columns:          
    for cell in col:        
        print(cell)
```

逐行/列遍历iter_rows/iter_cols。（参数min_row, min_col, max_col, max_row）

```python
for row in sheet1.iter_rows(min_row=1, min_col=1, max_col=3, max_row=3):
    for cell in row:
        print(cell)

for col in sheet1.iter_cols(min_row=1, min_col=1, max_col=3, max_row=3):
    for cell in col:
        print(cell)
```

---

## 数据表操作

```python
from openpyxl.worksheet.table import Table, TableStyleInfo
tab = Table(displayName="Table1", ref="A1:B15")
style = TableStyleInfo(
    name="TableStyleMedium9", showFirstColumn=False, showLastColumn=False, showRowStripes=True, showColumnStripes=True)

tab.tableStyleInfo = style
ws_main.add_table(tab)
```

---

## 文档操作

### 字体

Font

```python
from openpyxl.styles import Font, colors
bold_itatic_24_font = Font(name='等线', size=24, italic=True, color=colors.RED, bold=True)
ws['A1'].font = bold_itatic_24_font
```

### 对齐

Alignment

```python
from openpyxl.styles import Alignment
ws['A1'].alignment = Alignment(horizontal='center', vertical='center')
```

### 设置行高和列宽

```python
# 第2行行高
sheet.row_dimensions[2].height = 40
# C列列宽
sheet.column_dimensions['C'].width = 30
```

### 拆分合并单元格

```python
# 合并单元格， 往左上角写入数据即可
sheet.merge_cells('B1:G1') # 合并一行中的几个单元格
sheet.merge_cells('A1:C3') # 合并一个矩形区域中的单元格

# 拆分单元格
sheet.unmerge_cells('A1:C3')
```

### 隐藏行列

`ws_wtl.column_dimensions.group('A', 'D', hidden=True)`隐藏A~D列

`ws_wtl.row_dimensions.group(1, 10, hidden=True)`隐藏1~`0行
