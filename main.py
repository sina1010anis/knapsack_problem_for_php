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
