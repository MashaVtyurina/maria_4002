import numpy as np
A=['музыка','громче','глаза','закрыты','это','нонстоп']

def transform_list_of_strings_to_int(text):
    new_data=[]
    for word in text:
        el=0
        for letter in word:
            el+=ord(letter)
        new_data.append(el)
    return new_data

def the_longest_element(A):
    return max([ len (str(x)) for x in A])

def base_sized_empty_list(base):
    return [[] for _ in range (base)]

def value_of_the_current_digit(x,base,i):
    digit=(x//(base**i))%base
    return digit

def add_element_in_temp(temp,place,x):
    return temp[place].append(x)

def sort_elements_by_current_digit(digit,temp,x):
    return

def consider_one_element_by_one_digit(temp,x,base,i):
    digit=value_of_the_current_digit(x,base,i)
    return add_element_in_temp(temp,digit,x)

def sort_by_every_digit(max_digit,temp,base):
    for i in range (max_digit):
        [consider_one_element_by_one_digit(temp,x,base,i) for x in A]

def save_significant_temp_elements(temp,result):
    i=0
    for el in temp:
        if el!=None:
            result[i]=el
            i+=1
    return result

def radixsort(A,base):
    max_len=the_longest_element(A)
    temp = base_sized_empty_list(base)
    #sort_by_every_digit(max_len,temp,base)
    result=[]
    for i in range (max_len):
        
        [consider_one_element_by_one_digit(temp,x,base,i) for x in A]
        result=save_significant_temp_elements(temp,result)
        #temp = base_sized_empty_list(base)
            #digit=value_of_the_current_digit(x,base,i)
            #add_element_in_temp(temp,digit,x)
    
    #result=save_significant_temp_elements(temp,result)
    return result

print(transform_list_of_strings_to_int(A))
print('------------------------------------------------------------')
print(radixsort(transform_list_of_strings_to_int(A),10))