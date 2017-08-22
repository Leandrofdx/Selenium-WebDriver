package automatizacaoTeste.com.br;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

import static org.junit.Assert.assertTrue;

public class Logar {
	
	private WebDriver driver = null;
	
	public Logar(WebDriver driver){
		this.driver = driver;
	}
	
	public void logarNoSistema(){
		driver.get("http://localhost/sistema-nivel/login.php");
		
		WebElement usuario = driver.findElement(By.id("usuario"));
		WebElement senha = driver.findElement(By.id("senha"));
		WebElement botaoLogar = driver.findElement(By.name("entrar"));

		usuario.sendKeys("leandro");
		senha.sendKeys("123");
		botaoLogar.submit();
		
		boolean encontrou = driver.getPageSource().contains("Painel de Controle");
		assertTrue(encontrou);	
		
	}

}
