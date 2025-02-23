import numpy as np
n=18
m=3
T=np.array(n)
P=np.array(m)
T=list('NOBODY NOTICED HIM')
P=list('NOT')
print(T)
print(P)
for i in range (0,n-m,1):
    j=0
    while (j<m) and (P[j]==T[i+j]):
        j=j+1
    if j==m:
        print(i)
        