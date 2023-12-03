"""
text = 'در این مثال، با استفاده از تابع substr()، بخشی از رشته “Hello World” که شروع آن در جایگاه ششم قرار دارد و پنج حرف آن را شامل می‌شود، انتخاب شده است. در صورتی که مقدار طول را به عنوان پارامتر ورودی به تابع ندهید، تابع substr() تمام حروف باقی‌مانده را به عنوان خروجی برمی‌گرداند.'
pattern = 'تابع'
def rabinKarp(t, s):
    i = 0
    hs = hash(s)
    search = []
    while (i <= len(t)-len(s)):
        vhash = hash(t[i:len(s)])
        if (vhash == hs):
            search.append(i)
        i = i+1
    
    return search;

print(rabinKarp(text, pattern));
"""
# b = "Hello, World!"
# print(b[-5:-2])
 

# thislist = ["apple", "banana", "cherry", "orange", "kiwi", "melon", "mango"]
# print(thislist[2:5])

# thislist = ["apple", "banana", "cherry"]
# if "apple" in thislist:
#   print("Yes, 'apple' is in the fruits list")

# thislist = ["apple", "banana", "cherry"]
# thislist[1:2] = ["blackcurrant", "watermelon"]
# print(thislist)

# thislist = ["apple", "banana", "cherry"]
# thislist.insert(2, "watermelon")
# print(thislist)

# thislist = ["apple", "banana", "cherry"]
# tropical = ["mango", "apple", "papaya"]

# thislist.extend(tropical)

# print(thislist)

# thislist = ["apple", "banana", "cherry"]
# for x in range(len(thislist)):
#   print(thislist[x])

# thislist = ["apple", "banana", "cherry"]
# i = 0
# while i < len(thislist):
#   print(thislist[i])
#   i = i + 1

# thislist = ["apple", "banana", "cherry"]
# [print(x) for x in thislist]

# fruits = ["apple", "banana", "cherry", "kiwi", "mango"]
# newlist = []
# for x in fruits:
#   if "a" in x:
#     newlist.append(x)
# print(len(newlist))

# fruits = ["apple", "banana", "cherry", "kiwi", "mango"]
# newlist = [x for x in fruits if "a" in x]
# print(newlist)

# thislist = ["apple", "banana", "cherry"]
# mylist = thislist
# print(mylist)

# x = ("apple", "banana", "cherry")
# y = list(x)
# print(type(y))

# thistuple = ("apple", "banana", "cherry")
# y = ("orange",)
# thistuple += y
# print(thistuple)

# fruits = ("apple", "banana", "cherry", "strawberry", "raspberry")
# (green, yellow, *red) = fruits
# print(green)
# print(yellow)
# print(red)

# fruits = ("apple", "mango", "papaya", "pineapple", "cherry")
# (green, *tropic, red) = fruits
# print(green)
# print(tropic)
# print(red)

# thisset = {"apple", "banana", "cherry"}
# tropical = {"pineapple", "mango", "papaya"}
# thisset.update(tropical)
# print(thisset)

# set1 = {"a", "b" , "c"}
# set2 = {1, 2, 3}
# set3 = set1.union(set2)
# print(set3)

# thisdict = [{
#   "brand": "Ford",
#   "model": "Mustang",
#   "year": 1964
# }]
# print(len(thisdict))

# car = {
# "brand": "Ford",
# "model": "Mustang",
# "year": 1964
# }
# x = car.keys()
# print(x) #before the change
# car["color"] = "white"
# print(x)
# x = car.values()
# print(x)
# x = car.items()
# print(x)

# x = lambda a, b, c : a + b + c
# print(x(5, 6, 2))

# mystr = "banana"
# myit = iter(mystr)
# print(next(myit))
# print(next(myit))
# print(next(myit))
# print(next(myit))
# print(next(myit))
# print(next(myit))

# import tests.index as mx
# print(mx.myIndex(6))

# import index
# print(index.myIndex(6))

# import datetime
# x = datetime.datetime.now()
# print(x)

# import re
# txt = "The rain in Spain"
# x = re.search("^The.*Spain$", txt)

# try:
#   print(x)
# except NameError:
#   print("Variable x is not defined")

# username = input("Enter username:")
# print("Username is: " + username)

# price = 49
# txt = "The price is {} dollars"
# print(txt.format(price))

# myorder = "I have a {carname}, it is a {model}."
# print(myorder.format(carname = "Ford", model = "Mustang"))

# print(open('composer.json', 'r').read(1))

# f = open('composer.json', 'r')
# print([i+'\n' for i in f])

# import os 
# os.remove('text.txt')

# import matplotlib.pyplot as plt
# x = [4, 5, 10, 4, 3, 11, 14 , 6, 10, 12]
# y = [21, 19, 24, 17, 16, 25, 24, 22, 21, 21]
# plt.scatter(x, y)
# plt.show()

p_item = [0, 2, 3, 5, 4, 1]
m_item = [0, 3, 4, 8, 5, 6]
m = 8
n = len(p_item)
v = [[0 for x in range(m+1)] for x in range(n+1)]
for i in range(n+1):
    for j in range(m+1):
        if i == 0 or j == 0:
            v[i][j] = 0
        elif m_item[i-1] <= j:
            v[i][j] = max(v[i-1][j], v[i-1][j - m_item[i-1]] + p_item[i-1])
        else:
            v[i][j] = v[i-1][j]

print(v[n][m])

