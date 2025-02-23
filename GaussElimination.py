import numpy as np

A=[[2,-1,1],
   [4,1,-1],
   [1,1,1]]

b=[1,5,0]
n=3

def gauss_worse(A,b):
    for i in range (n):
        A[i][n]=b[i]
    for i in range (n-1):
        for j in range (i+1,n):
            for k in range (i,n+1):
                A[j][k]=A[j][k]-A[i][k]*A[j][i]/A[i][i]
    return 0

def BetterGaussElimination(A,b):
    for i in range (n):
        A[i].append(b[i])
    print(A)
    for i in range (n-1):
        pr=i
        for j in range (i+1,n):
            if np.abs(A[j][i])>np.abs(A[pr][i]):
                pr=j
        for k in range (i,n+1):
            A[i][k],A[pr][k]=A[pr][k],A[i][k]
        for j in range (i+1,n):
            f=A[j][i]/A[i][i]
            for k in range (i,n+1):
                A[j][k]=A[j][k]-A[i][k]*f
                
    Acut=[]
    for i in range (n):
        Acut.append(A[i][0:3])
    return Acut

def BetterGaussElimination_inv(A,b):
    for i in range (n-1,-1,-1):
        pr=i
        for j in range (i-1,-1,-1):
            if np.abs(A[j][i])>np.abs(A[pr][i]):
                pr=j
        for k in range (i,-1,-1):
            A[i][k],A[pr][k]=A[pr][k],A[i][k]
        for j in range (i-1,-1,-1):
            f=A[j][i]/A[i][i]
            for k in range (i,-1,-1):
                A[j][k]=A[j][k]-A[i][k]*f
                
    Acut=[]
    for i in range (n):
        Acut.append(A[i][0:3])
    return Acut
    
print('Augmented matrix:\n',BetterGaussElimination(A,b))
print('Double Augmented matrix:\n',BetterGaussElimination_inv(A,b))
#print('Check the result:\n',np.dot(BetterGaussElimination(A,b),b))