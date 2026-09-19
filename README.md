DBTool v3.1

DBTool은 웹 브라우저에서 MySQL / MariaDB / SQL Server 데이터베이스를 관리할 수 있는 가벼운 PHP 기반 데이터베이스 관리 도구입니다.

한국어와 English를 모두 지원하며, 로그인 화면과 메인 화면에서 언어를 변경할 수 있습니다.

---

✨ 주요 기능

🔐 웹 로그인

- 관리자 로그인
- 웹 사용자 추가 / 수정 / 삭제
- 사용자 비밀번호 변경
- 관리자 비밀번호 변경
- 로그인 상태 유지
- CSRF 보호
- 로그인 세션 관리

🌐 다국어 지원

지원 언어:

- 🇰🇷 한국어
- 🇺🇸 English

로그인 화면과 메인 화면에서 언어를 변경할 수 있습니다.

선택한 언어는 브라우저의 "localStorage"에 저장되어 다음 접속 시에도 유지됩니다.

---

🗄️ 데이터베이스 관리

지원 데이터베이스:

- MySQL
- MariaDB
- Microsoft SQL Server

DB 서버

- DB 서버 추가
- DB 서버 수정
- DB 서버 삭제
- DB 서버 연결
- DB 연결 정보 암호화 저장
- 여러 DB 서버 관리

데이터베이스

- 데이터베이스 목록 확인
- 데이터베이스 생성
- 데이터베이스 삭제
- 데이터베이스 검색
- 데이터베이스 사용량 확인

테이블

- 테이블 목록 확인
- 테이블 검색
- 테이블 데이터 확인
- 데이터 수정
- 데이터 삭제
- 테이블 삭제
- 테이블 비우기

SQL

- SQL 직접 실행
- SQL 실행 결과 확인

---

⚙️ 이벤트 및 트리거

Event Scheduler

- Event Scheduler 상태 확인
- Event Scheduler ON
- Event Scheduler OFF
- 이벤트 목록 확인
- 이벤트 생성
- 이벤트 삭제

Trigger

- Trigger 목록 확인
- Trigger 생성
- Trigger 삭제

---

👤 DB 사용자 관리

데이터베이스 서버의 사용자 계정을 관리할 수 있습니다.

- DB 사용자 목록
- DB 사용자 추가
- DB 사용자 삭제
- DB 사용자 권한 관리

«DB 사용자 계정과 DBTool 웹 로그인 계정은 서로 별도로 관리됩니다.»

---

📊 통계

DB 서버 및 데이터베이스의 기본적인 사용량과 상태를 확인할 수 있습니다.

- 데이터베이스 정보
- 테이블 정보
- 데이터베이스 크기
- 서버 정보
- 연결 정보

---

📱 반응형 디자인

PC뿐만 아니라 다양한 화면 크기를 지원합니다.

- 💻 Desktop
- 🖥️ Laptop
- 📱 Mobile
- 📲 Tablet

모바일에서는 사이드바 메뉴를 접었다 펼칠 수 있으며, 넓은 데이터 테이블은 가로 스크롤을 사용할 수 있습니다.

---

🚀 설치 방법

1. 파일 다운로드

GitHub 저장소를 다운로드합니다.

dbtool.php
recovery.php-disabled
dbtool.key
data/

---

2. 웹 서버에 업로드

PHP가 실행되는 웹 서버에 파일을 업로드합니다.

예:

public_html/
├── dbtool.php
├── recovery.php-disabled
├── dbtool.key
└── data/
    ├── config.php
    └── index.html

---

3. PHP 환경

권장 환경:

- PHP 8.0 이상
- PHP PDO
- PDO MySQL ("pdo_mysql")
- Microsoft SQL Server 사용 시 "pdo_sqlsrv"
- Sodium ("sodium")

MySQL / MariaDB를 사용하는 경우:

pdo_mysql

SQL Server를 사용하는 경우:

pdo_sqlsrv

확장이 필요합니다.

---

🔑 최초 로그인

처음 설치한 경우 기본 관리자 계정은 다음과 같습니다.

Username: admin
Password: admin

처음 로그인하면 관리자 비밀번호를 변경하는 것을 권장합니다.

«보안을 위해 기본 비밀번호를 계속 사용하는 것은 권장하지 않습니다.»

---

🔐 Recovery Code

DBTool에는 관리자 계정 복구 기능이 포함되어 있습니다.

복구 기능을 사용하려면:

recovery.php-disabled

파일을

recovery.php

로 변경합니다.

그 후 Recovery Code를 사용하여 관리자 계정을 복구할 수 있습니다.

복구가 끝난 후에는 보안을 위해 다시 이름을 변경하는 것을 권장합니다.

recovery.php
↓
recovery.php-disabled

---

🔒 보안

DBTool은 다음과 같은 보안 기능을 사용합니다.

- Password Hash
- CSRF Token
- Session Authentication
- DB 비밀번호 암호화
- Recovery Code Hash
- 로그인 실패 제한
- Recovery 시도 제한

DB 서버 비밀번호는 암호화되어 저장됩니다.

암호화에 사용되는 키는 다음 파일에 저장됩니다.

dbtool.key

"dbtool.key"는 절대로 다른 사람에게 공개하지 마세요.

---

⚠️ 중요: dbtool.key

DBTool v3.1은 다음 파일을 사용합니다.

dbtool.key

따라서 GitHub에 소스 코드를 공개할 경우 실제 운영 서버에서 사용하는 "dbtool.key"를 GitHub에 업로드하지 않는 것을 강력히 권장합니다.

".gitignore"에 다음을 추가하는 것을 권장합니다.

dbtool.key
data/config.php

GitHub에는 예시용 파일을 제공하고 실제 운영용 키는 서버에서 별도로 생성하는 방식을 권장합니다.

---

📁 파일 구조

DBTool/
│
├── dbtool.php
├── recovery.php-disabled
├── dbtool.key
│
├── data/
│   ├── config.php
│   └── index.html
│
└── README.md

---

🌍 Language / 언어 설정

로그인 화면 오른쪽 또는 상단의 언어 선택 메뉴에서 언어를 변경할 수 있습니다.

한국어
English

메인 화면에서도 동일하게 언어를 변경할 수 있습니다.

언어 변경 후 선택한 언어는 브라우저에 저장됩니다.

---

🛠️ 사용 예

DBTool에 접속합니다.

https://example.com/dbtool.php

로그인 후 DB 서버를 추가합니다.

Database Type
Server
Port
Username
Password

DB 서버에 연결하면 데이터베이스와 테이블을 관리할 수 있습니다.

---

📌 주의사항

DBTool은 강력한 데이터베이스 관리 기능을 제공하므로 운영 환경에서는 반드시 백업을 권장합니다.

특히 다음 기능은 데이터가 삭제될 수 있습니다.

- 데이터베이스 삭제
- 테이블 삭제
- 테이블 비우기
- 행 삭제
- DB 사용자 삭제

삭제된 데이터는 DBTool에서 복구할 수 없습니다.

---

📄 License

이 프로젝트의 라이선스는 저장소의 "LICENSE" 파일을 확인하세요.

---

🤝 Contributing

버그 수정, 기능 개선, 번역 개선 등의 Pull Request를 환영합니다.

문제가 발견되었다면 GitHub Issues를 이용해 알려주세요.

---

📮 Support

문제나 기능 요청은 GitHub Issues를 이용해 주세요.

---

DBTool v3.1

PHP 기반 MySQL / MariaDB / SQL Server 관리 도구

🇰🇷 Korean · 🇺🇸 English

---
