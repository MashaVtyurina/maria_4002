#"ВСЕ РАБОТАЕТ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!"
A=[4,2,0,3,1]

def swap(a,b):
    temp=a
    a=b
    b=temp
    return a,b

def recount_gap(gap):
    return gap*4//5

def ind_a_gap_away(i,gap):
    return i+gap

def off_the_swaps(swapped):
    return False
    
def indicate_the_swap(swapped):
    return True

def sort_the_gap(A,gap,swapped):
    for i in range(len(A) - gap):
        j = ind_a_gap_away(i,gap)
        if A[i] > A[j]:
            A[i],A[j] = swap(A[i], A[j])
            swapped = indicate_the_swap(swapped)

def combsort(A):
    gap = len(A)
    swapped = True
    while gap > 1 or swapped:
        gap=recount_gap(gap)
        swapped=off_the_swaps(swapped)
        sort_the_gap(A,gap,swapped)
    return A

combsort(A)
print(A)