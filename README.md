# ๐RAINBOW 2021-2 ๋น๋ฐ์ดํฐ ์์ฉ
<img src="https://img.shields.io/badge/HTML-E34F26?style=flat-square&logo=html5&logoColor=white"/> <img src="https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=XAMPP&logoColor=white"/> <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=PHP&logoColor=white"/> <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=MySQL&logoColor=white"/> <img src="https://img.shields.io/badge/Apache-D22128?style=flat-square&logo=Apache&logoColor=white"/> <br/>
์ฌ๋ฌ ์ฌ์ดํธ์์ ํ๋งคํ๊ณ  ์๋ ์ท๋ค์ ํ์ธ ๋ฐ ๋น๊ตํ  ์ ์์ผ๋ฉฐ,  
์๋ฅ์ ๊ฐ๊ฒฉ์ด๋ ์ค์  ๊ตฌ๋งค์์ ๋ฐ ๊ฒ์์ด ์์๋ฅผ ๋ถ์ํ์ฌ ํ์ฌ ํธ๋ ๋๋ฅผ ํ์ธํ  ์ ์๋ ์๋ฅ ์ ๋ณด ์ ๊ณต ์ฌ์ดํธ.
  
## ๐ER diagram
Site, Cloth_info, Search_rank, Search_record, User_info, Week, Category ์ด 6๊ฐ์ ํ์ด๋ธ๋ก ๊ตฌ์ฑ๋์ด ์๋ค.  
Cloth_info์ ๋ฐ์ดํฐ๋ ์ผํ๋ชฐ์ ํฌ๋กค๋งํ ๋ฐ์ดํฐ๋ฅผ, Week๋ Naver DataLab ๋ฐ์ดํฐ๋ฅผ ์ฌ์ฉํ์๋ค.  
![์คํฌ๋ฆฐ์ท(1057)](https://user-images.githubusercontent.com/71166763/143189376-0d6f1164-3f68-4666-8617-83201481c350.png)  

## ๐PHP diagram
![์ฌ๋ผ์ด๋1](https://user-images.githubusercontent.com/71166763/143732871-3e80f979-929b-429a-95bc-8bd71e9dd658.PNG)  

# ๐ํ์ด์ง ๊ตฌ์ฑ
## ๐ฑJoin & Login
ํ์๊ฐ์ ์ user_info ํ์ด๋ธ์ ํ์ ์ ๋ณด๊ฐ ์ ์ฅ๋๋ฉฐ, ๋ก๊ทธ์ธ ์ user_info ํ์ด๋ธ์์ ์ ๋ณด๋ฅผ ํ์ธํ๋ค.  
๋ก๊ทธ์ธ ์ ์ธ์์ด ์์๋๋ฉฐ, ๋ก๊ทธ์์ ์ ์ข๋ฃ๋๋ค.  
  
![์คํฌ๋ฆฐ์ท(1171)](https://user-images.githubusercontent.com/71166763/146906493-beb967f2-46a8-4c04-928e-8c9e2f69f269.png)  

## ๐ Home
์ฌ์ดํธ์ ๋ํ ๊ฐ๋จ ์ค๋ช๊ณผ ๋ถ์์ ์ ๊ณตํ๋ ์ผํ๋ชฐ ์ฌ์ดํธ์ ๋ํ ๊ฐ๋ตํ ์ค๋ช์ ๋ณด์ฌ์ค๋ค.  
  
![์คํฌ๋ฆฐ์ท(1034)](https://user-images.githubusercontent.com/71166763/142758355-3f64c464-6855-4ee2-afb2-11fae29186c9.png)  

## ๐ฅweek_hot
๊ทธ ์ฃผ์ ๊ฐ์ฅ ์ธ๊ธฐ ์์๋ ์นดํ๊ณ ๋ฆฌ์ ์ท ์ ๋ณด๋ฅผ ๋ณด์ฌ์ค๋ค.  
  
![์คํฌ๋ฆฐ์ท(1157)](https://user-images.githubusercontent.com/71166763/146755118-3abeca1a-243d-4379-8b70-b946c2bd2515.png)  

## ๐direct_search
์ํ๋ ์๋ฅ ์ ๋ณด๋ฅผ ์ฌ์ฉ์๊ฐ ์ง์  ๊ฒ์ํ  ์ ์๋ค. 
  
![์คํฌ๋ฆฐ์ท(1164)](https://user-images.githubusercontent.com/71166763/146756480-11d8bf9d-f7bd-474e-93ff-707829efc1fc.png)  

## โถSearch_result
๊ฒ์ ๊ฒฐ๊ณผ ํ์ด์ง. ๊ฐ๊ฒฉ๊ณผ ๊ตฌ๋งค์ Top3 ์ ๋ณด๋ฅผ ๋ณด์ฌ์ฃผ๊ณ , ํด๋น ๊ฒ์ ๊ฒฐ๊ณผ์ ํ๊ท  ๊ฐ๊ฒฉ์ ์๋ ค์ค๋ค.  

![์คํฌ๋ฆฐ์ท(1162)](https://user-images.githubusercontent.com/71166763/146756269-9ca5ceea-4e17-4307-9a2e-d117ef941b29.png)  

## ๐user_custom
๋ก๊ทธ์ธํ ์ฌ์ฉ์๊ฐ ๊ฐ์ฅ ๋ง์ด ๊ฒ์ํ ์นดํ๊ณ ๋ฆฌ์ ์ท ์ ๋ณด๋ฅผ ๋ณด์ฌ์ค๋ค.  
๋ง์ฝ, ๊ฒ์๊ธฐ๋ก์ด ์๋ค๋ฉด 'O๋์ ์ ์์ง ๋ชปํด์. ๋ค์์ ๋ค์ ๋ง๋์.'๋ฌธ๊ตฌ๋ฅผ ์ถ๋ ฅํ๋ค.
  
![1](https://user-images.githubusercontent.com/71166763/146908957-46ee2c51-af4e-47b9-bd0c-494bc9440e81.png)  

## ๐โuser_info
ํ์ ์ ๋ณด๋ฅผ ํ์ธํ  ์ ์์ผ๋ฉฐ, ๋น๋ฐ๋ฒํธ๋ฅผ ๋ณ๊ฒฝํ๊ฑฐ๋ ํ์ ํํด๋ฅผ ํ  ์ ์๋ค.  
  
![์คํฌ๋ฆฐ์ท(1050)](https://user-images.githubusercontent.com/71166763/142758449-c5059641-118a-4070-a153-5fa25cf1ddce.png)  

