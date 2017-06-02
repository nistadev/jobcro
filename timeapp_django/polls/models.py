from django.db import models

class Question(models.Model):
	txt_preg = models.CharField(max_length=200)
	data_publicacio = models.DateTimeField('date published')

	def __str__(self):
		return self.txt_preg

	def publicada_recentment(self):
		return self.data_publicacio >= timezone.now() - datetime.timedelta(days=1)

class Choice(models.Model):
	pregunta = models.ForeignKey(Question, on_delete=models.CASCADE)
	txt_tria = models.CharField(max_length=200)
	votes = models.IntegerField(default=0)

	def __str__(self):
		return self.txt_tria