# TSIC2-Proyecto-final
Proyecto final de la materia de Temas selectos en ingeniería en computación 2, utilizando kubernets

### Paso 1

Configurar cluster de kubernetes

https://help.clouding.io/hc/es/articles/4402401958034-C%C3%B3mo-instalar-un-cluster-de-Kubernetes-en-CentOS-8
https://upcloud.com/resources/tutorials/install-kubernetes-cluster-centos-8

### Paso 2
```console
cd definitions
```

### Paso 3
```console
kubectl apply -f php_fpm_service.yaml
```

### Paso 4
```console
kubectl apply -f nginx_service.yaml
```

### Paso 5
```console
kubectl create -f storageClass.yaml
```

### Paso 6

Dentro del worker-node ejecutar los siguientes comandos: 

```console
DIRNAME="vol"
mkdir -p /mnt/disk/$DIRNAME
chmod 777 /mnt/disk/$DIRNAME
```

### Paso 7
```console
kubectl create -f persistentVolume.yaml
```

### Paso 8
```console
kubectl apply -f code_volume.yaml
```

### Paso 9
```console
kubectl apply -f php_deployment.yaml
```

### Paso 10
```console
kubectl apply -f nginx_configMap.yaml
```

### Paso 11
```console
kubectl apply -f nginx_deployment.yaml
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
kubectl logs pod-name container-name
```
