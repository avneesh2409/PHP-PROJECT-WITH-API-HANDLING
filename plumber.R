# plumber.R

#* @assets ./public /static
list()

#* @get /mean
normalMean <- function(samples=10){
  data <- rnorm(samples)
  mean(data)
}

#* @get /api/<id:int>
#* @html
getId <- function(id=20){
	paste(c("<h1>you have given me this id :-</h1><strong>",id,"</strong>"), collapse = " ")
}

#* @get /api/data/<id:int>
#* @json
getData <- function(id){
df <- read.csv("./us.csv")
result <- jsonlite::toJSON(df[1:id,])
result
}


#* @get /api/xml/<id:int>
#* @xml
getXml <- function(id){
library("XML")
library("methods")
library("jsonlite")
result <- xmlParse(file="./csv/myxml.xml")
dataframe <-  xmlToDataFrame(xmlRoot(result)[[id]])
toJSON(dataframe)
}


#* @get /api/xml
#* @json
getXml <- function(){
library("XML")
library("methods")
library("jsonlite")
result <- xmlParse(file="./csv/myxml.xml")
dataframe <-  xmlToDataFrame(result)
toJSON(dataframe)
}


#* @get /api/list/<id>
getList <- function(id){
list(
    id = id,
    type = typeof(id)
  )
}

#' @post /user
function(req, id, name){
  list(
    id = id,
    name = name,
    raw = req$postBody
  )
}

#* @post /sum
addTwo <- function(a, b){
  as.numeric(a) + as.numeric(b)
}
