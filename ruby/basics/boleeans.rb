true # => true
false # => false
nil # => none/null

5 == 5 #=> true
5 == 6 #=> false

5 != 7 #=> true
5 != 5 #=> false

7 > 5 #=> true
5 > 7 #=> false

5 < 7 #=> true
7 < 5 #=> false

7 >= 7 #=> true
7 >= 5 #=> true

5 <= 5 #=> true
5 <= 7 #=> true

5.eql?(5.0) #=> false; although they are the same value, one is an integer and the other is a float
5.eql?(5)   #=> true

a = 5
b = 5
a.equal?(b) #=> true

a = "hello"
b = "hello"
a.equal?(b) #=> false

5 <=> 10    #=> -1
10 <=> 10   #=> 0
10 <=> 5    #=> 1
# The spaceship operator (<=>) returns -1 if the value on the left is less than the value on the right, 0 if the values are equal, and 1 if the value on the left is greater than the value on the right. This makes it useful for comparing two values.