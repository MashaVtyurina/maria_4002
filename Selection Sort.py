#import numpy as np
from random import randint
n=10
A=[randint(1,1000) for i in range (n)]
print(A)
count=0
for i in range (0,n-1,1):
    min=i
    for j in range (i+1,n):
        if A[j]<A[min]:
            count+=1
            min=j
    t=A[min]
    A[min]=A[i]
    A[i]=t
    print(A)
print (A)
print (count)