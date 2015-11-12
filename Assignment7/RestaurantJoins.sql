#describe City;
#describe Cuisine;
#describe Price_Range;
#describe Restaurant;

# Select All Restaurants
SELECT Restaurant.name as 'Restaurant', 
       Cuisine.name as 'Cuisine', 
	   City.name as 'City', 
       Price_Range.name as 'Price Range'
FROM Restaurant, Cuisine, City, Price_Range
WHERE Restaurant.cuisine_fk = Cuisine.id
      AND Restaurant.city_fk = City.id
      AND Restaurant.price_range_fk = Price_Range.id;

# Select Restaurants only located in Fremont      
SELECT Restaurant.name as 'Restaurant', 
	   City.name as 'City', 
       Price_Range.name as 'Price Range'
FROM Restaurant, Cuisine, City, Price_Range
WHERE Restaurant.cuisine_fk = Cuisine.id
      AND Restaurant.city_fk = City.id
      AND Restaurant.price_range_fk = Price_Range.id
      AND Restaurant.name = "Pepper Lunch";
