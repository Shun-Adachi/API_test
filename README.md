### 1. テスト用データベースの作成

```bash
docker-compose exec mysql bash
# mysqlコンテナ内で以下を実行(パスワードは"root")
mysql -u root -p

# MySQLクライアントで以下を実行
CREATE DATABASE restapipj;
GRANT ALL PRIVILEGES ON test.* TO 'laravel_user'@'%';
FLUSH PRIVILEGES;
```

http://localhost:8000/api/v1/rest
