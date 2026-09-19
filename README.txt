DBTool v3.1
===========
중요 변경: 내부 SQLite/PDO SQLite를 사용하지 않습니다.
웹 로그인/서버 설정은 data/config.php에 저장하며, DB 비밀번호는 dbtool.key로 암호화합니다.

주요 기능
- 웹 로그인 사용자 등록/수정/삭제
- 관리자 권한
- 관리자가 다른 사용자의 암호 변경
- 다중 DB 서버 등록/수정/삭제
- MySQL/MariaDB 및 SQL Server
- 데이터베이스 생성/삭제/선택
- 테이블 생성/삭제/비우기
- 테이블 구조/내용 보기
- 행 수정/삭제
- 전체 테이블 검색
- DB 이용통계
- DB 접속 세션 조회/종료
- 실제 DB 사용자 계정 추가/암호 수정/권한 수정/삭제
- MySQL/MariaDB 이벤트 생성/삭제
- Event Scheduler ON/OFF
- MySQL/MariaDB 트리거 생성/삭제/본문 보기
- SQL 직접 실행
- Recovery Code 1회 표시 및 5회 실패/15분 잠금

설치
1. dbtool 폴더 업로드
2. data 폴더가 PHP 프로세스에 쓰기 가능해야 함
3. dbtool.php 접속
4. 최초 admin / admin 로그인
5. 화면에 표시되는 Recovery Code를 안전하게 보관
6. admin 비밀번호 변경
7. 평상시 recovery.php-disabled 유지

필수 PHP
- PHP 8.1+
- PDO
- MySQL/MariaDB 사용: pdo_mysql
- SQL Server 사용: pdo_sqlsrv + Microsoft ODBC Driver

보안
- data/config.php와 data/dbtool.key는 웹에서 직접 접근할 수 없도록 서버 설정도 권장합니다.
- SQL 및 DB 계정 관리는 실제 DB에 영향을 줍니다.
- DB 사용자가 충분한 CREATE/ALTER/DROP/GRANT/KILL 권한을 가지고 있어야 모든 기능이 작동합니다.
