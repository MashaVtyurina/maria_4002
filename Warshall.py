import numpy as np

A=[[0,1,0,0],
   [0,0,0,1],
   [0,0,0,0],
   [1,0,1,0]] #орграф через матрицу смежности

def Warshall(A):
    n=len(A)
    #R=[[[[]for k in range (n)]for j in range (n)] for i in range (n)]
    #R[0]=A.copy()
    R_prev=A.copy()
    print(R_prev)
    R_cur=[[[] for j in range (n)] for i in range (n)]
    for k in range (n):
        
        for i in range (n):
            for j in range (n):
                R_cur[i][j]=int(R_prev[i][j] or R_prev[i][k] and R_prev[k][j])
                #print(R_cur[i][j])
                #R[k][i][j]=int(R[k-1][i][j] or (R[k-1][i][k]==1 and R[k-1][k][j]))
        t=R_prev
        R_prev=R_cur
        R_cur=t
        #print(R_prev)
    return R_prev

print(Warshall(A))