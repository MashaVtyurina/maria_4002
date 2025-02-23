from random import randint
n=10
A=[]
A=[randint(1,1000) for i in range (n)]
print(A)
print("Enter a number:")
k=int(input())
A.append(k)
print(A)

i=0
while (A[i]!=k):
    i=i+1
if i<n:
    print(i)
else:
    print(-1)