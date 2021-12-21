# 🌈RAINBOW 2021-2 빅데이터 응용
<img src="https://img.shields.io/badge/HTML-E34F26?style=flat-square&logo=html5&logoColor=white"/> <img src="https://img.shields.io/badge/XAMPP-FB7A24?style=flat-square&logo=XAMPP&logoColor=white"/> <img src="https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=PHP&logoColor=white"/> <img src="https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=MySQL&logoColor=white"/> <img src="https://img.shields.io/badge/Apache-D22128?style=flat-square&logo=Apache&logoColor=white"/> <br/>
여러 사이트에서 판매하고 있는 옷들의 데이터를 취합하여 한 사이트에서 확인하며 비교할 수 있으며, 의류의 가격이나, 실제 구매자수나 검색어 순위를 분석하여 현재 트렌드를 확인할 수 있는 의류 정보 제공 사이트를 구성한다.
## 📝ER diagram
Site, Cloth_info, Search_rank, Search_record, User_info, Week, Category 총 6개의 테이블로 구성되어 있다.  
Cloth_info의 데이터는 쇼핑몰을 크롤링한 데이터를, Week는 Naver DataLab 데이터를 사용하였다.  
![스크린샷(1057)](https://user-images.githubusercontent.com/71166763/143189376-0d6f1164-3f68-4666-8617-83201481c350.png)  

## 📃PHP diagram
![슬라이드1](https://user-images.githubusercontent.com/71166763/143732871-3e80f979-929b-429a-95bc-8bd71e9dd658.PNG)  

# 🌈페이지 구성
## 🖱Join & Login
회원가입 시 user_info 테이블에 회원 정보가 저장되며, 로그인 시 user_info 테이블에서 정보를 확인한다.  
로그인 시 세션이 시작되며, 로그아웃 시 종료된다.  
  
![스크린샷(1171)](https://user-images.githubusercontent.com/71166763/146906493-beb967f2-46a8-4c04-928e-8c9e2f69f269.png)  

## 🏠Home
사이트에 대한 간단 설명과 분석을 제공하는 쇼핑몰 사이트에 대한 간략한 설명을 보여준다.  
  
![스크린샷(1034)](https://user-images.githubusercontent.com/71166763/142758355-3f64c464-6855-4ee2-afb2-11fae29186c9.png)  

## 🔥week_hot
그 주에 가장 인기 있었던 카테고리의 옷 정보를 보여준다.  
  
![스크린샷(1157)](https://user-images.githubusercontent.com/71166763/146755118-3abeca1a-243d-4379-8b70-b946c2bd2515.png)  

## 🔎direct_search
원하는 의류 정보를 사용자가 직접 검색할 수 있다. 
  
![스크린샷(1164)](https://user-images.githubusercontent.com/71166763/146756480-11d8bf9d-f7bd-474e-93ff-707829efc1fc.png)  

## ▶Search_result
검색 결과 페이지. 가격과 구매수 Top3 정보를 보여주고, 해당 검색 결과의 평균 가격을 알려준다.  

![스크린샷(1162)](https://user-images.githubusercontent.com/71166763/146756269-9ca5ceea-4e17-4307-9a2e-d117ef941b29.png)  

## 👍user_custom
로그인한 사용자가 가장 많이 검색한 카테고리의 옷 정보를 보여준다.  
만약, 검색기록이 없다면 'O님을 잘 알지 못해요. 다음에 다시 만나요.'문구를 출력한다.
  
![1](https://user-images.githubusercontent.com/71166763/146908957-46ee2c51-af4e-47b9-bd0c-494bc9440e81.png)  

## 🙎‍user_info
회원 정보를 확인할 수 있으며, 비밀번호를 변경하거나 회원 탈퇴를 할 수 있다.  
  
![스크린샷(1050)](https://user-images.githubusercontent.com/71166763/142758449-c5059641-118a-4070-a153-5fa25cf1ddce.png)  

