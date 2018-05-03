"# infinity" 

Classes with functions
User->PasswordHash("NotYetHashedPassword")
  Hashes a password and stores it in the UserClass.
User->Login("Username")
  Retrieves the password from the database with the filled in Username
  Compares password with hashed password made with the previous function (PasswordHash)
  @Throws exceptions when "Username does not exist in database" or "Password is not the same"
