/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ES3;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Connector {

	//Java code for database connection
	
		Connection konek() throws SQLException
	{
		String path = "jdbc:mysql://127.0.0.1/es3";
		String uname = "root";
		String pass = "";
				
		Connection conn = DriverManager.getConnection(path,uname,pass);
		
		return conn;
	}
}

