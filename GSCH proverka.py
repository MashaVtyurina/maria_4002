import random
import numpy as np
import time
import math

n=10000
mword=32
m=2**(mword)-1
b=1
A=random.random()*m
a=0.0
a=random.random()*m
if (A%8==5):
    a=A
else:
    A=random.random()*m
#b=0
#a=69069
def gsch(n,m,a,b):
    seed=time.time()
    #print(seed)
    R=np.zeros(n)
    R[0]=seed
    R1=np.zeros(n)
    for i in range (1,n,1):
        R[i]=((a*R[i-1]+b)%m)
        R1[i]=R[i]/m
    return R1

R=np.zeros(n)
R=gsch(n,m,a,b)
print('Собственный генератор:')
print (R)

sum=0
for i in range(1,n,1):
    sum+=R[i]
Mr=(1/n)*sum
print("Mr = ",Mr)

sumdisp=0
for i in range (1,n,1):
    sumdisp+=(R[i]-Mr)**2
disp=sumdisp/n
print("D = ",disp)

sigma=math.sqrt(disp)
print("б = ",sigma)

bl=Mr-sigma
br=Mr+sigma
delta=br-bl
count=0
for i in range (1,n,1):
    if R[i]<=delta:
        count+=1
caught=count/n
print("Частотный тест: ",caught)

print('---------------------------------------------------')
print("Библиотечный генератор:")
L=np.zeros(n)
for i in range (n):
    L[i]=random.random()
print (L)

sum=0
for i in range(1,n,1):
    sum+=L[i]
Mr=(1/n)*sum
print("Mr = ",Mr)

sumdisp=0
for i in range (1,n,1):
    sumdisp+=(L[i]-Mr)**2
disp=sumdisp/n
print("D = ",disp)

sigma=math.sqrt(disp)
print("б = ",sigma)

bl=Mr-sigma
br=Mr+sigma
delta=br-bl
count=0
for i in range (1,n,1):
    if L[i]<=delta:
        count+=1
caught=count/n
print("Частотный тест: ",caught)