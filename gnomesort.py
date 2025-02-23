A=[-4.2,2.9,0.8,-3.765,1.86455]
#"ВСЕ РАБОТАЕТ!!!!!!!!!!!!!!!!!!!!!"
def swap(a,b):
    t=a
    a=b
    b=t
    return a,b

def jump_to_savepoint(i,savepoint):
    i=savepoint
    return i

def next_savepoint(savepoint):
    return savepoint+1

def gnome_optimize(i,savepoint):
    i=jump_to_savepoint(i,savepoint)
    savepoint=next_savepoint(savepoint)
    return i,savepoint

def gnomesort(A):
    i, savepoint = 1, 2
    while i < len(A):
        if A[i - 1] <= A[i]:
            i,savepoint=gnome_optimize(i,savepoint)
        else:
            A[i - 1], A[i]=swap(A[i - 1], A[i])
            i -= 1
            if i == 0:
                i,savepoint=gnome_optimize(i,savepoint)
    return A

print(gnomesort(A))
