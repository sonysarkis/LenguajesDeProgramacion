:my_symbol

"string" == "string"  #=> true

"string".object_id == "string".object_id  #=> false

:symbol.object_id == :symbol.object_id    #=> true

#Symbols are immutable, meaning they cannot be changed after they are created
#Symbols are useful when the value will remain constant throughout the life of an application
#Symbols are faster than strings because they are stored in memory only once, making them more efficient
#In ruby all is a object, so symbols are objects too