n=5
P=[2,-1,3,1,-5]
print(P)
x=3

def Horner(P,x):
    P.reverse()
    p=P[n-1]
    i=n-2
    while i>=0:
        p=x*p+P[i]
        print(p)
        i-=1
    return p

print('Значение полинома в точке x=',x,':',Horner(P,x))