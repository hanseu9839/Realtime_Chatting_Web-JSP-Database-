# Realtime_Chatting_Web-JSP-Database-

PHP를 사용하여 웹호스팅을 받아 1:1채팅을 구현하였습니다. 


데이터베이스에 접속하여 connect한다면 Database connected를 나오게 만들어주었다. 

![image](https://user-images.githubusercontent.com/62438578/139786286-89214668-cc4b-4ee3-bf75-39263af19a9e.png)





![image](https://user-images.githubusercontent.com/62438578/139786293-28759e45-494b-41ec-91fe-29e67c070224.png)

while절에다가 sql구문이 들어올 떄마다 계속 돌아가게 해주었으며 
sql2에 incoming_msg_id 또는 outgoing_ms_id가 unquie ID그리고 outgoing_msg_id와 outgoing_ID가 값을 넘겨주어서 ID를 비교해주어 채팅방에 대화가 나오도록 만들었으며 msg를 정렬 시켜주기위하여 DESC를 사용하여 정렬 시켜주었습니다.
row[‘status’]부분은 유저가 온라인인지 아닌지 확인해주는 부분입니다. 
만약 메시지가 28글자 이상이면 더 글자를 사용할 수 있게해주는 부분이다. 
![image](https://user-images.githubusercontent.com/62438578/139786315-34c49fbf-9e86-4938-83de-2d8fe214dcc4.png)

form, inputField,sendBtn,chatBox등을 선택할 수 있게 해주었다. submit오류가 발생하면 에러가 출력되도록 만들어주었다. 또한 Send Btn을 누르면 XML객체를 생성하여 xhr.open한다. post방식으로 그 후 php/insert-chat에 있는 것을 연다. xhr.onload를 해주고 readyState와  status를 if문을 통해 비교해준다. 데이터베이스에 삽입을 해주면 입력필드를 지워주기 위해 “” 로 만든다. scorlToBottom을 통해 아래에 만들어줌 
xhr.response는 서버에서 보낸 내용을 받아준다. 


![image](https://user-images.githubusercontent.com/62438578/139786327-aef2eee9-5fe4-43e6-bff3-4b58b9395918.png)

user login session을 담기 위해 섹션을 스타트해준다. 그후 config.php에있는 데이터베이스 연동을 연결해준후 email,password를 mysql과 커넥트할 때 email,passwrod를 escape형태로 만들어 준다. 보안을 위해서 사용해줌 만약 email과 password가 비어있지 않다면 사용자가 입력한 전자메일과 암호를 확인하여 테이블 행 전자 메일 및 암호를 데이터베이스에 저장해준다. 
![image](https://user-images.githubusercontent.com/62438578/139786334-bcc69c1b-57dd-4bda-9497-adcedce18453.png)


만약 세션아이디가 로그인 중이면 config.php를 데이터베이스 연결한다. 또한 logout_id변수에 logout_id를 가져온다. 그 후 status를 offline now로 바꾼다. sql구문을 sql변수에 넣어준다. 만약 unique_id와 logout_id가 같을 때 session을 없애준다.  
![image](https://user-images.githubusercontent.com/62438578/139786342-127eb5f4-ddd2-4d8e-9a9d-f9221bd45196.png)
검색기능이 되도록 만들어주었다. like를 사용하여 내가 한이나 초성을 입력하면 찾도록 만들어주었다. 

![image](https://user-images.githubusercontent.com/62438578/139786369-866ec974-2dc6-438e-bb42-f6f8679ce54b.png)


회원가입을 위한 php이다. if문에서 fname , lname , email , password등이 비어있는 것을 if문에서 확인해준다. 
if(filter_var($email,FILTER_VAILDATE_EMAIL) //만약 이메일이 타당하면 이메일이 데이터베이스에 있는지 확인한다.  중목된다면 email - already exist가 출력된다. 아니라면 이미지이름 업로드, 이미지 타입, 이미지 폴더의 위치 저장/이동을 한다.  이미지 확장을 통해 여러 가지 이미지가 업로드 되도록한다.
 ![image](https://user-images.githubusercontent.com/62438578/139786378-09f8fa5e-abf6-4746-a076-c2dda4416f2d.png)

사용자가 업로드한 이미지와 일치한다면 현재 시간을 리턴해준다. 또한 이미지 파일에 유니크한 이름을 부여하여 구별이 할 수 있도록 만든다.  
이미지를 images폴더에 저장을 시켜준다.  모든 입력해준것들을 sql에 구문을 통해서 데이터베이스에 insert시켜준다. 그 후 echo로 sucess를 출력해준다. 아니라면 Somethin went wrong!이 출력된다. 
 ![image](https://user-images.githubusercontent.com/62438578/139786385-f73ee27e-4132-4940-b48d-2460c61dbd1e.png)

로그인한 회원을 session에 넣어주어 로그아웃하거나 할 때 사용하기 위해 session을 로그인할 때 start해준다. 그 후 outgoing_id변수에 unique_id를 섹션에서 넣어주면 현재 사용하는 사용자의 id가 outgoing_id로 넘어간다. select 구문을 통해서 users테이블에서 가져온다. 
output에는 사용할 수 있는 채팅사용자가 아무도 없을 때 즉, 회원가입된사람이 없다면 채팅사용자가 없습니다로 화면에나오고 아니라면 data.php에 있는 내용이 출력되게끔 만들어주었다. 

![image](https://user-images.githubusercontent.com/62438578/139786406-48097c92-5b18-412d-9c9e-42d99d5f1770.png)

![image](https://user-images.githubusercontent.com/62438578/139786411-36bd4020-c138-4081-8d23-040f5ae0171d.png)

![image](https://user-images.githubusercontent.com/62438578/139786417-ec7447dd-7c70-47fb-aff2-256c5233deed.png)

![image](https://user-images.githubusercontent.com/62438578/139786422-d9465dc6-9fe3-4294-a845-ff03a2db0d26.png)


이런식으로 phpmyadmin에서 데이터베이스를 저장해주고 거기에다가 저장이 되어지게끔 만들었습니다. 
![image](https://user-images.githubusercontent.com/62438578/139786432-f0be2088-4b9e-4be8-beb6-3f9f1c02eb01.png)

회원가입 페이지를 직접 구성하여 만들었습니다. 파일선택을 하면 이미지가 저장이되어지겠끔 만들었으며 PNG,jpg등 다양한 사진이 선택되고 저장되어지게끔 만들었습니다. 
![image](https://user-images.githubusercontent.com/62438578/139786449-398a67c5-339a-480b-bdbd-a46339b1f621.png)

로그인 화면입니다.  로그인이되고 밑에보이는 눈을 클릭하면 비밀번호가 보이도록 만들었습니다. 
![image](https://user-images.githubusercontent.com/62438578/139786459-a2058214-d1dd-4bfd-83ca-773f1bd8d1f8.png)

![image](https://user-images.githubusercontent.com/62438578/139786463-48ebf7cd-615f-481f-bfb0-ed1068a25e55.png)

이런식으로 사용하여 Active now가 로그인하면 나오게끔 만들었습니다. 
![image](https://user-images.githubusercontent.com/62438578/139786473-32f7fadb-804d-4d55-a5f1-76bdfc4be81e.png)

요런식으로 실시간 채팅이 가능하게끔 만들어주었습니다. 참고로 1:1채팅만 가능합니다. 

닷홈서비스로 웹호스팅받은 URL :

