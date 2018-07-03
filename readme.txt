1. Clone project to the local enviorement.
2. Create virtual host
3. create new mysql database and restore database using pasan_sprii_test.sql script.
4. Add mysql credintial in to the etc/dbconfig.xml file
	<connection>
		<host>{hostname}</host>
		<user>{mysql_username}</user>
		<pass>{mysql_password}</pass>
		<dbname>{database_name}</dbname>
	</connection>