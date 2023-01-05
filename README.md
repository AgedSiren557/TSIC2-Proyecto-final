# TSIC2-Proyecto-final
Proyecto final de la materia de Temas selectos en ingeniería en computación 2, utilizando kubernets

### Paso 1

Configurar cluster de kubernetes

https://help.clouding.io/hc/es/articles/4402401958034-C%C3%B3mo-instalar-un-cluster-de-Kubernetes-en-CentOS-8
https://upcloud.com/resources/tutorials/install-kubernetes-cluster-centos-8
https://docs.google.com/document/d/1diOW_whS-QC-MX8Wv7YMTbw20Z5_RF_gSFW2i4GliwQ/edit

### Paso 2
```console
cd definitions
```

### Paso 3
```console
kubectl apply -f storageClass.yaml
```

### Paso 4
Ir al worker node y ejecutar los siguientes comandos
```console
DIRNAME="vol"
mkdir -p /mnt/disk/$DIRNAME
chmod 777 /mnt/disk/$DIRNAME
```

### Paso 5
Regresar al master node
```console
kubectl apply -f persistentVolume.yaml
kubectl apply -f code_volume.yaml
```

### Paso 6
```console
kubectl apply -f configmap.yaml
kubectl apply -f service.yaml
kubectl apply -f pod.yaml
```

### Paso 7
```console
cd mysql-definition
```

### Paso 8
```console
kubectl apply -f mysql-pvyaml
kubectl apply -f mysql-pv.yaml
```

### Paso 9
```console
kubectl exec --stdin --tty <pod-name-mysql> -- bash
mysql -p
password
```

### Paso 10
Dentro de la base de datos ejecutar los siguientes comandos
```sql
create database db_task;
use db_task;

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `task` (`task_id`, `task`, `status`) VALUES
(1, 'Check Errors', 'Done'),
(4, 'Remove Bugs', ''),
(5, 'Need Improvements', '');

ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);
  
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;
```


### Paso 11
Ir al master node y descargar el repositorio de git-hub
```console
git clone https://github.com/AgedSiren557/TSIC2-Proyecto-final.git
cd TSIC2-Proyecto-final
cd To Do List App
mv * /mnt/disk/vol
```

### Paso 12
Editar el archivo ***conn.php***
Poniendo la ip del servicio de nginx
Para consultar la ip se puede ejecutar el comando
```console
kubectl get svc
```

### Paso 13
Entrar a la página y revisar que todo funcione correctamente.

## Instalación de Prometheus y Grafana

### Paso 1
Dentro del master node descargar el repositorito de prometheus
```console
git clone https://github.com/prometheus-operator/kube-prometheus.git
```

### Paso 2
```console
kubectl apply --server-side -f manifests/setup
kubectl wait \
	--for condition=Established \
	--all CustomResourceDefinition \
	--namespace=monitoring
kubectl apply -f manifests/
```

### Paso 3
Revisar que todo se este ejecutanto corretamente con el comando
```console
kubectl -n monitoring get all
```

### Paso 4
Entrar a grafana para revisar las metricas y dashboards con
```console
kubectl -n monitoring port-forward <nombre-pod-grafana> 3000:3000
```

### Paso 5
Dentro de un navegador de nuestra mv ir a la siguiente dirección
```console
127.0.0.1:3000
```

## Comandos de ayuda

```console
kubectl exec --stdin --tty pod-name -- /bin/bash
```


```console
kubectl get svc
```

```console
kubectl delete svc/service_name
```

```console
kubectl get pv
```

```console
kubectl get deployments
```

```console
kubectl get pods
```

```console
kubectl describe pods pod-name
```

```console
kubectl logs pod-name
```

```console
kubectl logs pod-name --all-containers
```

acceder a la base de datos:

´´´
kubectl exec --stdin --tty <pod-name> -- /bin/bash
mysql -p
password
´´´
