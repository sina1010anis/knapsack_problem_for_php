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

