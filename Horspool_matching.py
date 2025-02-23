import numpy as np
P=list('barbie')
T=list('hello, my name is barbie')

alphabeth=[]
for letter in T:
    alphabeth.append(letter)

def ShiftTable(P,alphabeth):
    m=len(P)
    table={}
    for i in range (len(alphabeth)):
        table[alphabeth[i]]=m
    for j in range (m-2):
        table[P[j]]=m-j-1
    return table

def Horspool_matching(P,T):
    n=len(T)
    m=len(P)
    #print(n,m)
    table=ShiftTable(P,alphabeth)
    #print(table)
    i=m-1
    while i<=n-1:
        k=0
        while k<=m-1 and P[m-1-k]==T[i-k]:
            k=k+1
        if k==m:
            return i-m+1
        i=i+table[T[i]]
    return -1

print(Horspool_matching(P,T))