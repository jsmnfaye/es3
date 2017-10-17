/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package ES3;
import java.sql.*;

public class InsertData extends Connector{

public  InsertData() throws SQLException{
		
}

public void insert(String arduinoData) throws SQLException{


	
	String[] arduSplit = arduinoData.split("\\|");

	String volts = arduSplit[0];
	String lux = arduSplit[1];
        String celsius = arduSplit[2];
	
	System.out.println("Volts: "+volts+", Lumens: "+ lux+", Temperature: "+celsius);

	
//connect to database
	Connector x = new Connector();
//statement for inserting to dept table
	PreparedStatement stat = (PreparedStatement) x.konek().prepareStatement("Insert into myData(Voltage,Luminosity,Temperature) values (?,?,?)");
//prepared statement variables	
	stat.setString(1, volts);
	stat.setString(2, lux);
        stat.setString(3, celsius);


	stat.executeUpdate();


	

	}
}




