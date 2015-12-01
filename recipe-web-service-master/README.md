# recipe-web-service
RESTful web service for managing recipe

# setup
## git clone source code
git clone git@github.com:npu-tiger/recipe-web-service.git

## download and setup maven 3.0.4
- download and unzip http://archive.apache.org/dist/maven/maven-3/3.0.4/binaries/apache-maven-3.0.4-bin.zip
- set MAVEN_HOME to the path where apache-maven-3.0.4/bin located
- make sure JAVA_HOME is also set
- set both MAVEN_HOME and JAVA_HOME to PATH
- mvn -v to check if maven setup is successful
- also check the reference for help https://maven.apache.org/install.html

## mvn eclipse:eclipse
- at the source code root directory where pom.xml presents, run "mvn eclipse:eclipse" from command line
- the mvn build should be successful

## mysql setup
- download and install mysql
- download and install mysql workbench
- run database schema create script https://github.com/npu-tiger/db-schema/blob/master/recipe_schema_creation.sql
- run user data seed script https://github.com/npu-tiger/db-schema/blob/master/user_data_seed.sql
- run recipe data seed script https://github.com/npu-tiger/db-schema/blob/master/recipe_data_seed.sql
- run rank data seed script https://github.com/npu-tiger/db-schema/blob/master/rank_data_seed.sql

## start jetty server
- at the source code root directory where pom.xml presents, run "mvn jetty:run"
- "[INFO] Started Jetty Server" should be seen for a successful launch

## test endpoints
- use browser or curl to hit the endpoint: http://localhost:8080/recipe/rest/api
- if you see "welcome to recipe!" then your web service is running fine

# User Resource
## GET - get all
http://localhost:8080/recipe/rest/api/users
<br>Sample response:
{"users":[{"id":1,"username":"admin","email":"admin@recipe.com","nickname":"fun","createdBy":"admin","createdDate":1446175992000,"updatedBy":"adimn","updatedDate":1446176000000},{"id":3,"username":"user1","email":"user1@recipe.com","nickname":"fun","createdBy":"admin","createdDate":1446176035000,"updatedBy":"admin","updatedDate":1446176035000},{"id":4,"username":"dummyuser1","email":"dummyuser1@recipe.com","nickname":"fun","createdBy":"admin","createdDate":1446179244000,"updatedBy":"admin","updatedDate":1446179244000},{"id":5,"username":"dummyuser2","email":"dummyuser2@recipe.com","nickname":"too much fun","createdBy":"admin","createdDate":1447381140000,"updatedBy":"admin","updatedDate":1447381140000}]}

## GET - get by id
GET: http://localhost:8080/recipe/rest/api/users/1
<br>sample response: {"user":{"id":1,"username":"admin","email":"admin@recipe.com","nickname":"fun","createdBy":"admin","createdDate":1446175992000,"updatedBy":"adimn","updatedDate":1446176000000}}

## POST: create user
http://localhost:8080/recipe/rest/api/users
<br>sample request payload for post: {"id":null,"username":"dummyuser1","password":"password123","email":"dummyuser1@recipe.com","nickname":"fun"}
<br>sample response: {"user":{"id":5}}

# Recipe Resource
## GET - get all
http://localhost:8080/recipe/rest/api/recipes
<br>sample response: {"recipes":[{"id":1,"title":"Classic guacamole","description":"Super-quick and easy, this guacamole recipe is delicious with fajitas, quesadillas, dolloped into a wrap or served as a snack with crunchy veggies","difficulty":"Super easy","servingAmount":8,"cookingTime":10,"ingredient":"half small red onion, 1-2 resh red chillies, 3 ripe avocados, 1 bunch of fresh coriander, 6 ripe cherry tomatoes, 2 limes, extra virgin olive oil, sea salt, freshly ground black pepper","direction":"Peel the onion and deseed 1 chilli, then roughly chop it all on a large board. Destone the avocados and scoop the flesh onto the board.<br>Start chopping it all together until fine and well combined. Pick over most of the coriander leaves, roughly chop and add the tomatoes, then continue chopping it all together.<br>Add the juice from 1 lime and 1 tablespoon of oil, then season to taste with salt, pepper and lime juice. Deseed, finely chop and scatter over the remaining chilli if you want more of a kick, pick over the reserved coriander leaves, then serve.","nutritionFact":"calories: 91; carb: 1.8g; fat: 8.8g; protein: 1g; fiber: 8g; sugar: 1g; salt: 0g","imageUrl":"https://jamieoliverprod.s3.amazonaws.com/recipe-database/oldImages/recipe_single/1554_2_1441789324.jpg","userId":1,"category":"Appetizer","totalVote":2,"createdBy":"admin","createdDate":1447368130000,"updatedBy":"admin","updatedDate":1447368130000}]}

## GET - get by id
GET: http://localhost:8080/recipe/rest/api/recipes/1
<br>sample response: {"recipe":{"id":1,"title":"Classic guacamole","description":"Super-quick and easy, this guacamole recipe is delicious with fajitas, quesadillas, dolloped into a wrap or served as a snack with crunchy veggies","difficulty":"Super easy","servingAmount":8,"cookingTime":10,"ingredient":"half small red onion, 1-2 resh red chillies, 3 ripe avocados, 1 bunch of fresh coriander, 6 ripe cherry tomatoes, 2 limes, extra virgin olive oil, sea salt, freshly ground black pepper","direction":"Peel the onion and deseed 1 chilli, then roughly chop it all on a large board. Destone the avocados and scoop the flesh onto the board.<br>Start chopping it all together until fine and well combined. Pick over most of the coriander leaves, roughly chop and add the tomatoes, then continue chopping it all together.<br>Add the juice from 1 lime and 1 tablespoon of oil, then season to taste with salt, pepper and lime juice. Deseed, finely chop and scatter over the remaining chilli if you want more of a kick, pick over the reserved coriander leaves, then serve.","nutritionFact":"calories: 91; carb: 1.8g; fat: 8.8g; protein: 1g; fiber: 8g; sugar: 1g; salt: 0g","imageUrl":"https://jamieoliverprod.s3.amazonaws.com/recipe-database/oldImages/recipe_single/1554_2_1441789324.jpg","userId":1,"category":"Appetizer","totalVote":2,"createdBy":"admin","createdDate":1447368130000,"updatedBy":"admin","updatedDate":1447368130000}}

## POST: create recipe
http://localhost:8080/recipe/rest/api/recipes
<br>sample request payload for post: {"id":null,"title":"Super guacamole","description":"Super-delicious and easy, this guacamole recipe is delicious with fajitas, quesadillas, dolloped into a wrap or served as a snack with crunchy veggies","difficulty":"Easy","servingAmount":10,"cookingTime":12,"ingredient":"half small red onion, 1-2 resh red chillies, 3 ripe avocados, 1 bunch of fresh coriander, 6 ripe cherry tomatoes, 2 limes, extra virgin olive oil, sea salt, freshly ground black pepper","direction":"Peel the onion and deseed 1 chilli, then roughly chop it all on a large board. Destone the avocados and scoop the flesh onto the board.<br>Start chopping it all together until fine and well combined. Pick over most of the coriander leaves, roughly chop and add the tomatoes, then continue chopping it all together.<br>Add the juice from 1 lime and 1 tablespoon of oil, then season to taste with salt, pepper and lime juice. Deseed, finely chop and scatter over the remaining chilli if you want more of a kick, pick over the reserved coriander leaves, then serve.","nutritionFact":"calories: 91; carb: 1.8g; fat: 8.8g; protein: 1g; fiber: 8g; sugar: 1g; salt: 0g","imageUrl":"https://jamieoliverprod.s3.amazonaws.com/recipe-database/oldImages/recipe_single/1554_2_1441789324.jpg","userId":1,"category":"Appetizer"}
<br>sample response: {"recipe":{"id":2}}

# Rank Resource
## GET - get all
http://localhost:8080/recipe/rest/api/ranks
<br>sample response: {"ranks":[{"id":1,"rank":1,"recipeId":1,"userId":1,"status":"Active","createdBy":"admin","createdDate":1447368452000,"updatedBy":"admin","updatedDate":1447368452000},{"id":3,"rank":1,"recipeId":1,"userId":3,"status":"Active","createdBy":"admin","createdDate":1447368561000,"updatedBy":"admin","updatedDate":1447368561000}]}

## GET - get by id
GET: http://localhost:8080/recipe/rest/api/ranks/1
<br>sample response: {"rank":{"id":1,"rank":1,"recipeId":1,"userId":1,"status":"Active","createdBy":"admin","createdDate":1447368452000,"updatedBy":"admin","updatedDate":1447368452000}}

## POST: create rank (voting)
http://localhost:8080/recipe/rest/api/ranks
<br>sample request payload for post: {"id":null,"rank":1,"recipeId":1,"userId":4,"status":null}
<br>sample response: {"rank":{"id":5}}

# Auth Resource
## login
### Sample Request:
POST: http://localhost:8080/recipe/rest/api/auth/login
<br>Content-Type: application/x-www-form-urlencoded 
<br>username=admin
<br>password=password123
### Sample Response:
{"user":{"id":1,"username":"admin","email":"admin@recipe.com","nickname":"fun","createdBy":"admin","createdDate":1446175992000,"updatedBy":"adimn","updatedDate":1446176000000}}

## logout
sample request: http://localhost:8080/recipe/rest/api/auth/logout
sample response: 200 OK

# reference
http://www.eclipse.org/jetty/documentation/current/jetty-maven-plugin.html
