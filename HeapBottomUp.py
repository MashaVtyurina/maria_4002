import numpy as np
import random

#n=len(Htest-1)
#H=np.zeros([n+1])
Htest=[0,2,9,7,6]
#n=len(Htest)-1
#for i in range (1,n+1):
#    H[i]=random.randint(1,20)
print(Htest)
print('----------------------------------------------')

def HeapBottomUp(H):
    n=len(H)-1
    for i in range (n//2,-1,-1):
        k=i
        v=H[k]
        heap=False
        while not heap and 2*k<=n:
            j=2*k
            if j<n:
                if H[j]<H[j+1]:
                    j=j+1
            if v>=H[j]:
                heap=True
            else:
                H[k]=H[j]
                k=j
        H[k]=v
        
    return H

print(HeapBottomUp(Htest))
