import numpy as np
A=[4+5j,2+0j,0+7j,3+9j,6+5j]

def leave_the_modules(C):
    c=[]
    for i in range (len(C)):
        c.append(np.abs(C[i]))
    return c

#from combsort import *
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
###########################################
def size_of_one_bucket(A,number_of_buckets):
    l=len(A)%number_of_buckets
    q=0
    if l==0:
        q=len(A)/number_of_buckets
    else:
        q=len(A)//number_of_buckets+1
    return q

def fill_the_buckets(A,buckets,number_of_buckets):
    i=0
    bucket_size=int(size_of_one_bucket(A,number_of_buckets))
    while i<len(A):
        buckets.append(A[i:i+bucket_size])
        i+=bucket_size
    return buckets

def sort_the_buckets(buckets):
    for bucket in buckets:
        bucket=combsort(bucket)
    return buckets

def index_of_the_bucket_with_min(buckets):
        min_index=0
        for i in range(1, len(buckets)):
            if buckets[i][0] < buckets[min_index][0]:
                min_index = i
        return min_index
    

def bucketsort(A,number_of_buckets):
    buckets=[]
    fill_the_buckets(A,buckets,number_of_buckets)
    buckets=sort_the_buckets(buckets)
    result=[]
    while buckets:
        bucket_with_min=buckets[index_of_the_bucket_with_min(buckets)]
        result.append(bucket_with_min[0])
        bucket_with_min.pop(0)
        if len(bucket_with_min)==0:
            buckets.pop(buckets.index(bucket_with_min))
    return result
print(leave_the_modules(A))
print('--------------------------------------------')
print(bucketsort(leave_the_modules(A),3))
