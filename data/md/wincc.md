# WINCC-VBS-文件管理
## 创建文件
```
set fso = server.CreateObject("Scripting.FileSystemObject")
set f = fso.CreateTextFile("C:\test.txt", true) '第二个参数表示目标文件存在时是否覆盖
f.Write("写入内容")
f.WriteLine("写入内容并换行")
f.WriteBlankLines(3) '写入三个空白行（相当于在文本编辑器中按三次回车）
f.Close()
set f = nothing
set fso = nothing
```
## 打开并读文件
```
set fso = server.CreateObject("Scripting.FileSystemObject")
set f = fso.OpenTextFile("C:\test.txt", 1, false) '第二个参数 1 表示只读打开，第三个参数表示目标文件不存在时是否创建
f.Skip(3) '将当前位置向后移三个字符
f.SkipLine() '将当前位置移动到下一行的第一个字符，注意：无参数
response.Write f.Read(3) '从当前位置向后读取三个字符，并将当前位置向后移三个字符
response.Write f.ReadLine() '从当前位置向后读取直到遇到换行符（不读取换行符），并将当前位置移动到下一行的第一个字符，注意：无参数
response.Write f.ReadAll() '从当前位置向后读取，直到文件结束，并将当前位置移动到文件的最后
if f.atEndOfLine then
   response.Write("一行的结尾！")
end if
if f.atEndOfStream then
    response.Write("文件的结尾！")
end if
f.Close()
set f = nothing
set fso = nothing
```
## 打开并写文件
```
set fso = server.CreateObject("Scripting.FileSystemObject")
set f = fso.OpenTextFile("C:\test.txt", 2, false) '第二个参数 2 表示重写，如果是 8 表示追加
f.Write("写入内容")
f.WriteLine("写入内容并换行")
f.WriteBlankLines(3) '写入三个空白行（相当于在文本编辑器中按三次回车）
f.Close()
set f = nothing
set fso = nothing
```
## 判断文件是否存在
```
set fso = server.CreateObject("Scripting.FileSystemObject")
if fso.FileExists("C:\test.txt") then
    response.Write("目标文件存在")
else
    response.Write("目标文件不存在")
end if
set fso = nothing
```
## 移动文件
```
set fso = server.CreateObject("Scripting.FileSystemObject")
call fso.MoveFile("C:\test.txt", "D:\test111.txt") '两个参数的文件名部分可以不同
set fso = nothing
```
## 复制文件
```
set fso = server.CreateObject("Scripting.FileSystemObject")
call fso.CopyFile("C:\test.txt", "D:\test111.txt") '两个参数的文件名部分可以不同
set fso = nothing
```
## 删除文件
```
set fso = server.CreateObject("Scripting.FileSystemObject")
fso.DeleteFile("C:\test.txt")
set fso = nothing
```
## 创建文件夹
```
set fso = server.CreateObject("Scripting.FileSystemObject")
fso.CreateFolder("C:\test") '目标文件夹的父文件夹必须存在
set fso = nothing
```
## 判断文件夹是否存在
```
set fso = server.CreateObject("Scripting.FileSystemObject")
if fso.FolderExists("C:\Windows") then
    response.Write("目标文件夹存在")
else
    response.Write("目标文件夹不存在")
end if
set fso = nothing
```
## 删除文件夹
```
set fso = server.CreateObject("Scripting.FileSystemObject")
fso.DeleteFolder("C:\test") '文件夹不必为空
set fso = nothing
```
## 检测驱动器C盘是否存在
```
Set fso = Server.CreateObject("Scripting.FileSystemObject")
fso.DriveExists("c:")
```
## 获取文件路径的驱动器名
```
Set fso=Server.CreateObject("Scripting.FileSystemObject")
p=fso.GetDriveName(Server.MapPath("aqa33"))
Response.Write("驱动器名称是：" & p)
set fs=nothing
```
## 某路径的父文件夹的名称
```
Set fso=Server.CreateObject("Scripting.FileSystemObject")
p=fso.GetParentFolderName(Server.MapPath("aqa331.asp"))
Response.Write("父文件夹名称是：" & p)
set fs=nothing
```
##  某路径中的最后一个成分的文件扩展名 
```
Set fs=Server.CreateObject("Scripting.FileSystemObject")
Response.Write(fs.GetExtensionName(Server.MapPath("aqa33.asxd")))
set fs=nothing
```
## 某路径中的最后一个成分的文件名 
```
Set fs=Server.CreateObject("Scripting.FileSystemObject")
Response.Write(fs.GetFileName(Server.MapPath("aqa33.asxd")))
set fs=nothing
```
## 返回在指定的路径中文件或者文件夹的基本名称。
```
Set fso=Server.CreateObject("Scripting.FileSystemObject")
Response.Write(fso.GetBaseName("c:\windows\cursors\abc.cur"))
Response.Write("<br />")
Response.Write(fso.GetBaseName("c:\windows\cursors\"))
Response.Write("<br />")
Response.Write(fso.GetBaseName("c:\windows\"))
set fso=nothing
```

