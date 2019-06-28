arreglo threads[numero_cores]; //representacion de los cores
volatile queue procesos[numero_procesos]; //queue con los procesos

for(i=0,i<numero_cores;i++){ //para inicializar cada core
    inicializar(thread[i]);
  }

//aqui deberia ir un push de los procesos con su tiempo de ejecucion

//esto deberia hacer cada thread/core, creo que deberia ir como una función??

while(!procesos.empty){
  x=0;
  acceder.mutex; //accede al lock o es bloqueado si es que otro core accedió a la seccción critica
  if(!procesos.empty){ //if en caso de que otro core se haya llevado el ultimo proceso y no queden mas
    x = procesos.front(); //"agarra" el proceso para ejecutarlo
    //Aquí hay un pequeño vacío porque igual tenemos que tener el id del proceso, una solución a eso es cambiar la queue por un vector, tratarla como queue y ocupar los indices+1 como ID
    procesos.pop(); //elimina el proceso del queue
  }
  liberar.mutex; //libera el lock para que otro core sea libre de buscar otro proceso mientras lo ejecuta
  cout << "Core N°Y ejecutando proceso Z por X segundos" << endl;
  thread.sleep(x); //ejecuta el proceso, si el sleep es 0 significa que ya no quedan mas procesos para ejecutarse
}
terminar.thread();

//fin
