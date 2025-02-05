room_tidy = true
room_tidy_two = true

if room_tidy == true
  print "I can play video games"
end

if 1 < 2
  puts "Hot diggity, 1 is less than 2!"
end

puts "Hot diggity damn, 1 is less than 2" if 1 < 2

if room_tidy == false
  puts "release the goat"
else
  puts "release the shark"
end

if room_tidy == false
  puts "release the goat"
elsif room_tidy_two == true
  puts "release the shark"
else
  puts "release Kevin the octopus"
end

if 1 < 2 && 5 < 6
  puts "Party at Kevin's!"
end

# This can also be written as
if 1 < 2 and 5 < 6
  puts "Party at Kevin's!"
end

if 10 < 2 || 5 < 6 #=> although the left expression is false, there is a party at Kevin's because the right expression returns true
  puts "Party at Kevin's!"
end

# This can also be written as
if 10 < 2 or 5 < 6
  puts "Party at Kevin's!"
end

if !false     #=> true
  if !(10 < 5)  #=> true
  end
end

grade = 'F'
did_i_pass = case grade #=> create a variable `did_i_pass` and assign the result of a call to case with the variable grade passed in
  when 'A' then "Hell yeah!"
  when 'D' then "Don't tell your mother."
  else "'YOU SHALL NOT PASS!' -Gandalf"
end
print did_i_pass
#or
grade = 'F'
case grade
when 'A'
  puts "You're a genius"
  future_bank_account_balance = 5_000_000
when 'D'
  puts "Better luck next time"
  can_i_retire_soon = false
else
  puts "'YOU SHALL NOT PASS!' -Gandalf"
  fml = true
end

age = 19
unless age < 18
  puts "Get a job."
end

age = 19
puts "Welcome to a life of debt." unless age < 18

unless age < 18
  puts "Down with that sort of thing."
else
  puts "Careful now!"
end

age = 19
response = age < 18 ? "You still have your entire life ahead of you." : "You're all grown up."
puts response #=> "You're all grown up."
