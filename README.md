# Asset-Management
Asset management system of the university
![image index](https://github.com/tannguyenit/Asset-Management/blob/master/assets/files/2017-07-15_131207.jpg)
![image chat](https://github.com/tannguyenit/Asset-Management/blob/master/assets/files/2017-07-15_131420.jpg)
## Development
### Require
* docker
* docker-compose

### Run on local
1. Copy env file
```bash
cp .env.example .env
```
2. Run docker
```bash
docker-compose up -d
```
3. Update database information

Update database information on this file

`application/config/database.php`

4. Access via browser

visit http://localhost:8080

5. Access database via phpmyadmin

visit http://localhost:8081
