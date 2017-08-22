package automatizacaoTeste.com.br;

import static org.junit.Assert.assertTrue;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.support.ui.WebDriverWait;

public class ManterUsuarios {
	private WebDriver driver = null;
	
	public ManterUsuarios(WebDriver driver){
		this.driver = driver;
	}
	
	public void cadastrar(String nome, String usuario, String senha, String tipoUsuario){
		
		driver.findElement(By.linkText("Cadastrar Usuário")).click();
		
		WebElement campoNome = driver.findElement(By.id("nome"));
		WebElement campoUsuario = driver.findElement(By.id("usuario"));
		WebElement campoSenha = driver.findElement(By.id("senha"));
		Select campoTipo = new Select(driver.findElement(By.id("tipo")));
		WebElement botaoContinuar = driver.findElement(By.id("continuar"));	
				
		campoNome.sendKeys(nome);
		campoUsuario.sendKeys(usuario);
		campoSenha.sendKeys(senha);
		campoTipo.selectByVisibleText(tipoUsuario);
		botaoContinuar.submit();
		
		boolean encontrou = driver.getPageSource().contains(nome);
		assertTrue(encontrou);	
	}
	
	public void editar(int elemento, String tipoUsuario){
		List<WebElement> lista = driver.findElements(By.className("editar"));
		lista.get(elemento).click();
		
		Select campoTipo = new Select(driver.findElement(By.id("tipo")));
		campoTipo.selectByVisibleText(tipoUsuario);
		
		WebElement botaoContinuar = driver.findElement(By.id("continuar"));	
		botaoContinuar.submit();
	}
	
	public void excluir(int elemento, String nome){
		
		@SuppressWarnings("deprecation")
		Boolean tempoDeEspera = new WebDriverWait(driver, 10).until(ExpectedConditions.textToBePresentInElement(By.className("Usuarios"), nome));
		assertTrue(tempoDeEspera);
		
		List<WebElement> excluir = driver.findElements(By.className("excluir"));
		excluir.get(elemento).click();	

	}
	
}
