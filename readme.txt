1. Clone project to the local enviorement.
2. Create virtual host
3. create new mysql database and restore database using pasan_sprii_test.sql file.
3. Add mysql credintial in to the etc/dbconfig.xml file
	<connection>
		<host>localhost</host>
		<user>root</user>
		<password></password>
		<dbname>pasan_sprii_test</dbname>
	</connection>